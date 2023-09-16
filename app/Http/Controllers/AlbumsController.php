<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorealbumsRequest;
use App\Http\Requests\UpdatealbumsRequest;
use App\Models\albums;
use App\Models\Foto;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = session()->get('user_id');
        $albums = albums::where('user_id',$user_id)->get();
        return view('pages.albums.index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorealbumsRequest $request)
    {
        // dd($request->user_id);
        $request->validate([
            'name' => 'required|string',
            'user_id' => ['required', Rule::exists('users', 'name')],
            'kategori_album' => 'required|string',
        ]);
        $album = new albums;
        $album->name = $request->name;
        $album->user_id = User::where('name', $request->user_id)->first()->id;
        $album->kategori_album = $request->kategori_album;
        $album->save();

        return redirect()->route('albums.index')->with('massage', 'Album created successfully');
    //     $request->validate([
    //         'title' => 'required|string',
    //         'album_id' => 'required',
    //         'deskripsi' => 'required|max:800|string',
    //         'file_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'visibility' => 'required',
    //     ]);

    //     $image = $request->file('file_image');
    //     $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
    //     $image->storeAs('public/uploads', $imageName);

    //     $foto = new Foto;
    //     $foto->title = $request->title;
    //     $foto->album_id = $request->album_id;
    //     $foto->deskripsi = $request->deskripsi;
    //     $foto->visibility = $request->visibility;
    //     $foto->file_image = $imageName;
    //     $foto->save();

    //     return redirect()->back()->with('message', 'Gambar berhasil diunggah.');
    }

    /**
     * Display the specified resource.
     */
        public function show(albums $album)
        {
            $fotos = Foto::where('album_id',$album->id)->get();
            return view('pages.albums.image',compact('album','fotos'));
        }

    /**
     * Show the form for editing the specified resource.
     */
        public function edit(albums $album)
        {
            return view('pages.albums.edit',compact('album'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, albums $album)
        {
            $request->validate([
                'name' => 'required|string',
            ]);
            $album->update([
                'name' => $request->name
            ]);
            return redirect()->route('albums.index')->with('message', 'Album updated successfully');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(albums $album)
    {
        $album->delete();
        return back();
    }
}
