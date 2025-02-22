<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QrCodes;
use App\Models\Memorial;
use Illuminate\Support\Facades\Auth;

class QrCodeController extends Controller
{

    public function showAttachForm(string $token)
    {
        // Ищем QR-код по токену
        $qr = QrCodes::where('token', $token)->firstOrFail();
        
        // Если QR-код уже привязан к мемориалу
        if ($qr->memorial_id) {
            // Находим мемориал
            $memorial = Memorial::findOrFail($qr->memorial_id);
            
            // Если у мемориала есть slug, делаем редирект на страницу со slug
            if ($memorial->slug) {
                // return redirect()->route('memorial.show', $memorial->slug, 301);

                return redirect()->route('memorial.show', $memorial->slug)->setStatusCode(301);
            }
            
            // Если slug нет, редиректим по ID
            return redirect()->route('memorial.show', $qr->memorial_id);
        }
        
        // Если QR-код еще не привязан
        if (!Auth::check()) {
            // Сохраняем токен QR-кода в сессии
            session(['qr_token' => $token]);
            
            return redirect()
                ->route('login')
                ->with('message', 'Пожалуйста, войдите для привязки QR-кода');
        }
        
        // Показываем форму привязки
        return view('memorial.attach', compact('token'));
    }



    // public function showAttachForm($token)
    // {
    //     $qr = QrCodes::where('token', $token)->firstOrFail();

    //     if ($qr->memorial_id) {
    //         return redirect()->route('memorial.show', $qr->memorial_id);
    //     }

    //     return view('memorial.attach', compact('token'));
    // }

    // public function attach(Request $request)
    // {
    //     //  dd($request);

    //     $request->validate([
    //         'token' => 'required|exists:qr_codes,token',
    //         'name' => 'required|string',
    //         'birth_date' => 'nullable|date',
    //         'death_date' => 'nullable|date',
    //         'photo' => 'nullable|image|max:2048',
    //         'biography' => 'nullable|string|max:10000',
    //         'history' => 'nullable|string|max:10000',
    //         'story' => 'nullable|string|max:10000', 
    //     ]);

    //     $photoPath = $request->file('photo') ? $request->file('photo')->store('photos', 'public') : null;

    //     // Создаем мемориал
    //     $memorial = Memorial::create([
    //         'name' => $request->name,
    //         'birth_date' => $request->birth_date,
    //         'death_date' => $request->death_date,
    //         'photo' => $photoPath,
    //         'biography' => $request->biography,
    //         'history' => $request->history,
    //         'story' => $request->story,

    //     ]);

    //     // Привязываем QR-код
    //     QrCodes::where('token', $request->token)->update(['memorial_id' => $memorial->id]);

    //     return redirect()->route('memorial.show', $memorial->id);
    // }
}
