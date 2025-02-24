<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Memorial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    public function dashboard()
    {
        $admin_id = Auth::user()->id;

        $memorials = Memorial::with(['admin'])
            ->where('admin_id', $admin_id)
            ->get();

        return view('profile.dashboard', compact('memorials'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate(
                [
                    'email' => $googleUser->getEmail(),
                ],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('google'),
                    'email_verified_at' => now()
                ]
            );

            Auth::login($user);

            // Проверяем наличие токена QR в сессии
            if (session()->has('qr_token')) {
                $token = session('qr_token');
                session()->forget('qr_token');
                return redirect()->to(url("/memorial/attach/{$token}"));
            }

            // По умолчанию редирект в админ-панель
            return redirect()->route('admin.dashboard'); // Предполагается, что маршрут существует
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['error' => 'Failed to sign in with Google']);
        }
    }
}
