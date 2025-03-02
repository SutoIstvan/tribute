<?php

namespace App\Http\Controllers;

use App\Models\Memorial;
use App\Models\MemorialImage;
use App\Models\QrCodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// use App\Models\Image;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Imagick;
use ImagickDraw;
use ImagickPixel;

class MemorialController extends Controller
{
    public function show($slugOrId)
    {
        $memorial = Memorial::where('slug', $slugOrId)
            ->orWhere('id', $slugOrId)
            ->firstOrFail();
    
        $images = $memorial->memorialimages;

        $comments = $memorial->comments()
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->get();
    
        // Если входной параметр совпадает с id, а в модели присутствует slug, делаем редирект
        if ((string) $memorial->id === (string) $slugOrId && $memorial->slug) {
            return redirect()->route('memorial.show', $memorial->slug)->setStatusCode(301);
        }
    
        return view('memorial.show', compact('memorial', 'images', 'comments'));
    }
    

    public function codelist()
    {
        $memorials = QrCodes::all();
        return view('codelist', compact('memorials'));
    }

    public function saveMemorial(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'birth_date' => 'required|string|min:3|max:255',
            'death_date' => 'required|string|min:3|max:255',
            'biography' => 'required|string|min:3|max:2255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:22048',
        ]);

        $admin_id = Auth::user()->id;


        $memorial = new Memorial();
        $memorial->id = $request->token;
        $memorial->name = $request->name;
        $slug = Str::slug($request->name);
        $count = Memorial::where('slug', 'LIKE', "{$slug}%")->count();
        $memorial->slug = $count ? "{$slug}-{$count}" : $slug;
        $memorial->birth_date = $request->birth_date;
        $memorial->death_date = $request->death_date;
        $memorial->story = $request->story;
        $memorial->biography = $request->biography;
        $memorial->qr_code = $request->token;
        $memorial->admin_id = $admin_id;
        $memorial->save();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $originalName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $slugName = Str::slug($originalName); // Делаем имя безопасным
            $filename = $slugName . '_' . time() . '.webp'; // Устанавливаем WebP

            // Создаем путь с ID мемориала
            $path = 'images/memorials/' . $memorial->id;

            $image = Image::read($photo)
            ->scale(width: 1300)
            ->toWebp(90);

            // Удаляем старое фото, если оно есть
            if ($memorial->photo) {
                Storage::disk('public')->delete($path . '/' . $memorial->photo);
            }

            // Сохраняем новое фото
            Storage::disk('public')->put($path . '/' . $filename, $image->toString());


            $memorial->photo = $filename;
            $memorial->save();
        }

        QrCodes::where('token', $request->token)->update(['memorial_id' => $memorial->id]);

        return redirect()->route('dashboard', ['id' => $memorial->id]);
    }

    public function images()
    {
        return view('memorial.images');
    }

    public function imagesstore(Request $request)
    {

        dd($request);
        $request->validate([
            'title' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $memorial = Memorial::create(['title' => $request->title]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('memorials', 'public');

                $memorial->memorialimages()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('memorials.index');
    }





    public function edit($id)
    {
        $memorial = Memorial::findOrFail($id);
        return view('memorial.edit', compact('memorial'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'birth_date' => 'required|string|min:3|max:255',
            'death_date' => 'required|string|min:3|max:255',
            'biography' => 'required|string|min:3|max:2255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' =>   [
                            'nullable',
                            'regex:/^[a-z0-9-]+$/',
                            Rule::unique('memorials', 'slug')->ignore($id),
                        ],
            'video' => 'string|max:2255',

        ]);

        $memorial = Memorial::findOrFail($id);
        // $memorial->slug = $request->slug;
        if ($request->filled('slug') && $request->slug !== $memorial->slug) {
            $memorial->slug = $request->slug;
        }
        $memorial->name = $request->name;
        $memorial->birth_date = $request->birth_date;
        $memorial->death_date = $request->death_date;
        $memorial->biography = $request->biography;
        $memorial->video = $request->video;

        // Обновление фото, если загружен новый файл
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $originalName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $slugName = Str::slug($originalName); // Делаем имя безопасным
            $filename = $slugName . '_' . time() . '.webp'; // Устанавливаем WebP

            // Создаем путь с ID мемориала
            $path = 'images/memorials/' . $memorial->id;

            $image = Image::read($photo)
            ->scale(width: 1300)
            ->toWebp(90);

            // Удаляем старое фото, если оно есть
            if ($memorial->photo) {
                Storage::disk('public')->delete($path . '/' . $memorial->photo);
            }

            // Сохраняем новое фото
            Storage::disk('public')->put($path . '/' . $filename, $image->toString());


            $memorial->photo = $filename;
        }

        $memorial->save();

        return redirect()->route('memorial.edit', $id)->with('success', 'Információ frissítve!');
    }



    public function editImages($id)
    {
        $memorial = Memorial::with('memorialimages')->findOrFail($id);
        return view('memorial.imagesedit', compact('memorial'));
    }

    public function uploadImages(Request $request, $id)
    {
        // dd($request);
        // Проверяем общий размер всех файлов (10MB максимум)
        $totalSize = array_sum(array_map(function ($file) {
            return $file->getSize();
        }, $request->file('images')));

        if ($totalSize > 10 * 1024 * 1024) {
            return back()->with('error', 'Общий размер файлов не должен превышать 10MB');
        }

        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:20048',
        ]);

        $memorial = Memorial::findOrFail($id);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $photo) {
                // Получаем оригинальное имя и расширение
                $originalName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                $slugName = Str::slug($originalName); // Делаем имя безопасным
                $filename = $slugName . '_' . time() . '.webp'; // Устанавливаем WebP

                // Создаем путь с ID мемориала
                $path = 'images/memorials/' . $memorial->id;

                // Обрабатываем изображение
                $image = Image::read($photo)
                    ->scale(width: 1300)
                    ->toWebp(90);

                // Сохраняем обработанное изображение
                Storage::disk('public')->put($path . '/' . $filename, $image->toString());


                // Создаем запись в базе данных
                $memorial->memorialimages()->create([
                    'image_path' => $path . '/' . $filename
                ]);
            }
        }

        return redirect()->route('memorial.images.edit', $id)
            ->with('success', 'A képek sikeresen feltöltve!');
    }

    public function deleteImage($id)
    {
        $image = MemorialImage::findOrFail($id);
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return back()->with('success', 'Изображение удалено');
    }

    public function updateImages(Request $request, Memorial $memorial)
    {
        $request->validate([
            'images' => 'array',
            'images.*.id' => 'required|exists:memorial_images,id',
            // 'images.*.image_date' => 'nullable|date',
            'images.*.image_date' => 'nullable|string|max:255',
            'images.*.image_description' => 'nullable|string|max:255',
        ]);

        foreach ($request->images as $imageData) {
            $image = MemorialImage::find($imageData['id']);
            if ($image) {
                $image->update([
                    'image_date' => $imageData['image_date'],
                    'image_description' => $imageData['image_description'],
                ]);
            }
        }

        return redirect()->back()->with('success', 'A képek leírása frissítve!');
    }


    public function destroy(Memorial $memorial)
    {
        $memorial->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Emlékoldal sikeresen törölve.');
    }


    /**
     * Сохранение мемориала и генерация QR-кода одной кнопкой
     */
    public function saveMemorialWithQR(Request $request)
    {
        // Валидация запроса
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'birth_date' => 'required|string|min:3|max:255',
            'death_date' => 'required|string|min:3|max:255',
            'biography' => 'required|string|min:3|max:2255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:22048',
        ]);

        $admin_id = Auth::user()->id;

        // Генерируем уникальный токен для QR-кода
        $token = $this->generateUniqueToken();

        // Создаем запись QR-кода в БД
        $qrCode = QrCodes::create([
            'token' => $token
        ]);

        // Создаем мемориал
        $memorial = new Memorial();
        $memorial->id = $token;
        $memorial->name = $request->name;
        $slug = Str::slug($request->name);
        $count = Memorial::where('slug', 'LIKE', "{$slug}%")->count();
        $memorial->slug = $count ? "{$slug}-{$count}" : $slug;
        $memorial->birth_date = $request->birth_date;
        $memorial->death_date = $request->death_date;
        $memorial->story = $request->story ?? '';
        $memorial->biography = $request->biography;
        $memorial->qr_code = $token;
        $memorial->admin_id = $admin_id;
        $memorial->save();

        // Обрабатываем фотографию
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $originalName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $slugName = Str::slug($originalName);
            $filename = $slugName . '_' . time() . '.webp';
            
            // Создаем путь с ID мемориала
            $path = 'images/memorials/' . $memorial->id;
            
            $image = Image::read($photo)
                ->scale(width: 1300)
                ->toWebp(90);
            
            // Сохраняем новое фото
            Storage::disk('public')->put($path . '/' . $filename, $image->toString());
            
            $memorial->photo = $filename;
            $memorial->save();
        }

        // Генерируем и сохраняем QR-код
        $this->generateQRCode($token, $memorial);

        // Обновляем связь QR-кода с мемориалом
        $qrCode->update([
            'memorial_id' => $memorial->id,
            'status' => 'free',
            'qr_code' => "qrcode/{$memorial->id}.png",
        ]);

        return redirect()->route('dashboard', ['id' => $memorial->id])
                         ->with('success', 'Мемориал успешно создан и QR-код сгенерирован');
    }

    /**
     * Генерация уникального токена
     */
    protected function generateUniqueToken()
    {
        $maxAttempts = 10; // Максимальное количество попыток для избежания вечного цикла
        $attempts = 0;
        
        do {
            $token = str_pad(rand(0, 999999999999), 12, '0', STR_PAD_LEFT);
            $exists = QrCodes::where('token', $token)->exists();
            $attempts++;
        } while ($exists && $attempts < $maxAttempts);
        
        // Если после всех попыток не найден уникальный токен, используем timestamp и random
        if ($exists) {
            $token = str_pad(time() . rand(0, 999999), 12, '0', STR_PAD_LEFT);
        }
        
        return $token;
    }

    /**
     * Генерация QR-кода для мемориала
     */
    protected function generateQRCode($token, $memorial)
    {
        // Убедимся, что директория существует
        Storage::disk('public')->makeDirectory('qrcodes');

        // Генерируем QR-код с URL на страницу мемориала
        $qrImage = QrCode::format('png')
            ->size(340)
            ->margin(1)
            ->generate(url("/memorial/{$memorial->slug}"));

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
        $draw->setFontSize(21);
        $draw->setFontWeight(700);
        $draw->setGravity(Imagick::GRAVITY_SOUTH);
        $draw->setFillColor(new ImagickPixel('#000000'));

        // Добавляем токен как текст внизу изображения
        $background->annotateImage(
            $draw,
            0,    // x
            5,    // y - отступ от нижнего края
            0,    // угол
            $token // текст (токен)
        );

        // Сохраняем готовое изображение
        $filePath = "qrcodes/{$token}.png";
        Storage::disk('public')->put(
            $filePath, 
            $background->getImageBlob()
        );

        // Обновляем мемориал с путем к QR-коду
        $memorial->update(['qr_code' => $filePath]);

        // Очищаем память
        $image->clear();
        $background->clear();

        return $filePath;
    }

    public function create()
    {
        return view('memorial.create');
    }
}
