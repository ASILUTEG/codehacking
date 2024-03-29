<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMediaController extends Controller
{
    //
    public function index()
    {
        $photos = \App\photo::all();
        return view('admin.media.index', compact('photos'));
    }

    public function create()
    {

        return view('admin.media.create');
    }
    public function store(Request  $request)
    {

        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);
        \App\photo::create(['path' => $name]);
    }
    public function destroy($id)
    {
        $photo = \App\photo::findOrFail($id);
        unlink(public_path() . $photo->path);
        $photo->delete();
        $photos = \App\photo::all();
        return view('admin.media.index', compact('photos'));
    }
}
