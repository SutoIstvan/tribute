<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\QrCodes;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\Facades\Image;


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



        // for ($i = 0; $i < 10; $i++) {
        //     $token = str_pad(rand(0, 999999999999), 12, '0', STR_PAD_LEFT);

        //     // Создаем запись в базе данных
        //     $qrCode = QrCodes::create([
        //         'token' => $token
        //     ]);

        //     // Генерируем QR-код
        //     $qrCodeImage = QrCode::format('png')
        //         ->size(300)
        //         ->generate(url("/memorial/attach/$token"));

        //     // Загружаем рамку
        //     $frameImage = Image::make(public_path('images/frame.png'));

        //     // Создаем холст размером с рамку
        //     $image = Image::make($frameImage);

        //     // Вставляем QR-код поверх рамки
        //     $qrCodeImageObj = Image::make($qrCodeImage);
        //     $image->insert(
        //         $qrCodeImageObj, 
        //         'center', 
        //         0, 
        //         50  // Отступ сверху, чтобы QR-код был в нужном месте рамки
        //     );

        //     // Сохраняем изображение
        //     $filePath = "qrcodes/{$token}.png";
        //     $image->save(storage_path("app/public/{$filePath}"));

        //     // Обновляем путь в базе данных
        //     $qrCode->update(['qr_code' => $filePath]);
        // }
    }
}
