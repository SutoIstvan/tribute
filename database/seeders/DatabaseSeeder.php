<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\QrCodes;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            
            // $token = Str::random(12); // Генерируем уникальный токен

            $token = str_pad(rand(0, 999999999999), 12, '0', STR_PAD_LEFT);

            // Создаем запись в базе данных
            $qrCode = QrCodes::create([
                'token' => $token
            ]);

            // Генерируем QR-код
            $qrImage = QrCode::format('svg')
                ->size(300)
                ->generate(url("/memorial/attach/$token"));

            // Сохраняем QR-код в хранилище
            $filePath = "qrcodes/{$token}.svg";
            Storage::disk('public')->put($filePath, $qrImage);

            // Можно добавить поле `qr_path` в БД, если хочешь хранить путь
            $qrCode->update(['qr_code' => $filePath]);
        }
    }
}

