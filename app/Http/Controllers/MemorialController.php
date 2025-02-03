<?php

namespace App\Http\Controllers;

use App\Models\Memorial;
use Illuminate\Http\Request;

class MemorialController extends Controller
{
    public function show($id)
    {
        $memorial = Memorial::findOrFail($id);
        return view('memorial.show', compact('memorial'));
    }
}
