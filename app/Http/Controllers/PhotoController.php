<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request, $id)
    {
        $album = Album::findorfail($id);

        $request->validate([
            'files'   => 'required',
            'files.*' => 'max:20000|mimes:jpg,png,jpeg',
        ]);
        foreach ($request->file('files') as $key => $file) {

            $path = Storage::disk('public')->put('uploads', $file);

            $album->photo()->create([
                'path' => $path,
                'name' => $file->getClientOriginalName(),
                'type' => $file->getClientMimeType(),
            ]);
        }

        return redirect(route('albums.edit', [ $album->id ]));

    }


    public function destroy(photo $photo)
    {
        $photo->delete();

        return redirect()->back();
    }
}
