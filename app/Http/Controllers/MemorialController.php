<?php

namespace App\Http\Controllers;

use App\Models\Memorial;
use App\Models\QrCodes;
use Illuminate\Http\Request;
use App\Models\Image;

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

        dd($request);
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'birth_date' => 'required|string|min:3|max:255',
            'death_date' => 'required|string|min:3|max:255',
            'story' => 'required|string|min:3|max:1255',
            'biography' => 'required|string|min:3|max:2255',
        ]);

        $memorial = new Memorial();
        $memorial->name = $request->name;
        $memorial->birth_date = $request->birth_date;
        $memorial->death_date = $request->death_date;
        $memorial->story = $request->story;
        $memorial->biography = $request->biography;
        $memorial->save();

        return redirect()->route('memorial.images', ['id' => $memorial->id]);
    }

    public function imagesMemorial($id)
    {
        $id = $id;
        return view('memorial.images', compact('id'));
    }
    
}
