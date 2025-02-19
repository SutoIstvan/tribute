<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Проверяем наличие токена QR в сессии
        if (session()->has('qr_token')) {
            $token = session('qr_token');
            session()->forget('qr_token');
            return redirect()->to(url("/memorial/attach/{$token}"));
        }

        // По умолчанию редирект в админ панель
        return redirect()->route('dashboard'); // Замените на ваш route админ панели
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function authenticated(Request $request, $user)
    {
        if (session()->has('qr_token')) {
            $token = session('qr_token');
            session()->forget('qr_token');
            return redirect()->route('memorial.attach', ['token' => $token]);
        }
    
        $previousUrl = url()->previous();
        return redirect($previousUrl);
    }
}
