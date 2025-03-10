<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Memorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //  return view('image');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('file');

        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $slugName = Str::slug($originalName); // Делаем имя безопасным
        $filename = $slugName . '_' . time() . '.webp'; // Устанавливаем WebP

        $memorial_id = $request->id;
        $path = 'images/memorials/' . $memorial_id;

        $photo = Image::read($image)
        ->scale(width: 1300)
        ->toWebp(90);

        Storage::disk('public')->put($path . '/' . $filename, $photo->toString());

        // $imagePath = Storage::disk('public')->putFileAs($path, $image, $imageName);

        $imageUpload = new Image();
        $imageUpload->filename = $filename;
        $imageUpload->memorial_id = $memorial_id;
        $imageUpload->save();

        return response()->json(['success' => $filename]);
    }



    // public function uploadTempImage(Request $request)
    // {
    //     // Валидация файла
    //     $request->validate([
    //         'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    //     ]);

    //     $image = $request->file('file');
    //     $imageName = time() . '_' . $image->getClientOriginalName();
    //     $path = '/images/temp/';

    //     // Используем только один метод сохранения
    //     Storage::disk('public')->putFileAs($path, $image, $imageName);

    //     // Сохраняем имя файла в сессии
    //     $tempImages = session()->get('temp_images', []);
    //     $tempImages[] = $imageName;
    //     session()->put('temp_images', $tempImages);

    //     return response()->json(['success' => $imageName, 'temp' => true]);
    // }



    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
