<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\QrCodes;
use Imagick;
use ImagickDraw;
use ImagickPixel;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Убедимся, что директория существует
        Storage::disk('public')->makeDirectory('qrcodes');

        for ($i = 0; $i < 10; $i++) {
            // Генерируем 12-значный номер с ведущими нулями
            $token = str_pad(rand(0, 999999999999), 12, '0', STR_PAD_LEFT);

            // Создаем запись в БД
            $qrCode = QrCodes::create([
                'token' => $token
            ]);

            // Генерируем QR-код с логотипом
            $qrImage = QrCode::format('png')
                ->size(340)
                // ->merge('/public/scan-qr-code2.png', 0.3)
                ->margin(1)
                ->generate(url("/memorial/attach/$token"));

            // Создаем объект Imagick для QR-кода
            $image = new Imagick();
            $image->readImageBlob($qrImage);

            // Загружаем фоновое изображение
            $background = new Imagick(public_path('png.png'));

            // Центрируем QR-код на фоне
            $background->compositeImage(
                $image, 
                Imagick::COMPOSITE_DEFAULT,
                ($background->getImageWidth() - $image->getImageWidth()) / 2,
                ($background->getImageHeight() - $image->getImageHeight()) / 2
            );

            // Настраиваем параметры текста
            $draw = new ImagickDraw();
            $draw->setFontSize(20);
            $draw->setFontWeight(400);
            $draw->setGravity(Imagick::GRAVITY_SOUTH);
            $draw->setFillColor(new ImagickPixel('#000000'));

            // Добавляем токен как текст внизу изображения
            $background->annotateImage(
                $draw,
                0,    // x
                7,   // y - отступ от нижнего края
                0,    // угол
                $token // текст (токен)
            );

            // Сохраняем готовое изображение
            $filePath = "qrcodes/{$token}.png";
            Storage::disk('public')->put(
                $filePath, 
                $background->getImageBlob()
            );

            // Обновляем запись в БД с путем к файлу
            $qrCode->update(['qr_code' => $filePath]);

            // Очищаем память
            $image->clear();
            $background->clear();
        }
    }
}