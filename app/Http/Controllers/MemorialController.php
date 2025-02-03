<?php

namespace App\Http\Controllers;

use App\Models\Memorial;
use App\Models\QrCodes;
use Illuminate\Http\Request;

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
}
