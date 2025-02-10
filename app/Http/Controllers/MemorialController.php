<?php

namespace App\Http\Controllers;

use App\Models\Memorial;
use App\Models\QrCodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use App\Models\Image;
use Intervention\Image\Laravel\Facades\Image;

class MemorialController extends Controller
{
    public function show($id)
    {
        $memorial = Memorial::findOrFail($id);
        return view('memorial.show', compact('memorial'));
    }

    public function showall()
    {
        $memorials = QrCodes::all();
        return view('memorial.showall', compact('memorials'));
    }

    public function saveMemorial(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'birth_date' => 'required|string|min:3|max:255',
            'death_date' => 'required|string|min:3|max:255',
            // 'story' => 'required|string|min:3|max:1255',
            'biography' => 'required|string|min:3|max:2255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $memorial = new Memorial();
        $memorial->name = $request->name;
        $memorial->birth_date = $request->birth_date;
        $memorial->death_date = $request->death_date;
        $memorial->story = $request->story;
        $memorial->biography = $request->biography;
    
        // Сначала сохраняем мемориал чтобы получить ID
        $memorial->save();
    
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $originalName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $filename = $originalName . '_' . time() . '.' . $extension;
            
            // Создаем путь с ID мемориала
            $path = 'images/memorials/' . $memorial->id;
            
            $image = Image::read($photo)
                ->scale(width: 1300);
                
            Storage::disk('public')->put(
                $path . '/' . $filename, 
                $image->toJpeg()->toString()
            );
            
            $memorial->photo = $filename;
            $memorial->save(); // Сохраняем обновленную модель с фото
        }
    
        return redirect()->route('dashboard', ['id' => $memorial->id]);
    }
    
    

    public function imagesMemorial($id)
    {
        $id = $id;
        return view('memorial.images', compact('id'));
    }
    
}
