<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFotoRequest;
use App\Http\Requests\StoreKommentar_fotoRequest;
use App\Http\Requests\UpdateFotoRequest;
use App\Models\albums;
use App\Models\Foto;
use App\Models\Kommentar_foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotos = Foto::all()->where('visibility', 'public');
        return view('pages.explore.index',compact('fotos'));
    }

    public function explore(){
        $fotos = Foto::all()->where('visibility', 'public');
        return view('pages.explore.index',compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFotoRequest $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'title' => 'nullable|string',
        //     'album_id' =>'nullable',
        //     'deskripsi'=>'nullable|max:800|string',
        //     'file_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'visibility' => 'nullable',
        // ]);





        $image = $request->file('file_image');
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/uploads/', $imageName);

        $foto = new Foto;
        $foto->title = $request->title;
        $foto->album_id = $request->album_id;
        $foto->deskripsi = $request->deskripsi;
        $foto->visibility = $request->visibility;
        $foto->file_image = $imageName;
        $foto->save();

        return back()->with('massage', 'Gambar berhasil diunggah.');
    }





    /**
     * Display the specified resource.
     */
    public function showKomentar(Foto $foto)
    {
        $komentar = Kommentar_foto::all();

        dd($komentar);
        dd($foto);

        return view('pages.kommentar_foto.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foto $foto)
    {
        return view('pages.foto.edit',compact('foto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foto $foto)
    {
        $request->validate([
            'title' => 'string',
            'album_id' => '',
            'deskripsi' => 'max:800|string',
            'file_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'visibility' => '',
        ],[
            'file_image.image' => 'File harus berupa gambar.',
            'file_image.max' => 'Ukuran gambar tidak boleh melebihi 2MB.'
        ]);

        // Update data yang tidak terkait dengan file gambar
        $foto->title = $request->title;
        $foto->album_id = $request->album_id;
        $foto->deskripsi = $request->deskripsi;
        $foto->visibility = $request->visibility;

        // Periksa apakah file gambar baru diberikan
        if ($request->hasFile('file_image')) {
            $image = $request->file('file_image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads', $imageName);

            // Hapus file gambar lama jika perlu
            // Uncomment baris berikut jika ingin menghapus file gambar lama
            Storage::delete('public/uploads/' . $foto->file_image);

            // Update kolom file_image dengan nama file yang baru
            $foto->file_image = $imageName;
        }

        $foto->save();

        return redirect()->route('albums.show',$foto->album_id)->with('massage', 'Gambar berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $foto)
    {

        Storage::delete('public/uploads/' . $foto->file_image);
        $foto->delete();
        return back();
    }
}
