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
                ->with('message', 'Kérjük, jelentkezzen be a QR-kód összekapcsolásához');
        }
        
        // Показываем форму привязки
        return view('memorial.attach', compact('token'));
    }
}
