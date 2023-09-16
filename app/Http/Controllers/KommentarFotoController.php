<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKommentar_fotoRequest;
use App\Http\Requests\UpdateKommentar_fotoRequest;
use App\Models\Kommentar_foto;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class KommentarFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $id)
    {
        dd($id);
        $kommentar = Kommentar_foto::where('id', $id)->get();
        return view('pages.kommentar_foto.index',compact('kommentar'));
    }

    public function showKommentar(int $id){
        $foto_id = $id;
        $komentar = Kommentar_foto::with('user')->where('foto_id',$id)->get();
        return view('pages.kommentar_foto.index',compact('komentar','foto_id'));
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
    public function store(StoreKommentar_fotoRequest $request)
    {

        $request->validate([
            'isi_komentar' => 'required|string',
        ],[
            'isi_komentar.required' => "gak boleh kosong!!"
        ]);

        Kommentar_foto::create([
            "user_id" => Auth::user()->id,
            "foto_id" => $request->foto_id,
            "isi_komentar" => $request->isi_komentar,
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        // $komentar = new Kommentar_foto();
        // $komentar->user_id = $request->user_id;
        // $komentar->foto_id = $request->foto_id;
        // $komentar->isi_komentar = $request->isi_komentar;
        // $komentar->save();

        return back()->with("success","berhasil menambahkan komentar");
    }
    public function lihat(int $id)
    {
        $foto_id = $id;
        $komentar = Kommentar_foto::with('user')->where('foto_id',$id)->get();
        return view('pages.kommentar_foto.index',compact('komentar','foto_id'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Kommentar_foto $komentar)
    {
        dd('hello');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kommentar_foto $komentar)
    {
        return view('pages.kommentar_foto.edit',compact('komentar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKommentar_fotoRequest $request, Kommentar_foto $komentar)
    {

        $request->validate([
            'isi_komentar' => 'required|string',
        ], [
            'isi_komentar.required' => "gak boleh kosong!!"
        ]);

        $komentar->isi_komentar = $request->isi_komentar;
        $komentar->updated_at = now();
        $komentar->save();

        return redirect()->route('lihatkomen', $komentar->foto_id)->with("success", "Berhasil memperbarui komentar");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kommentar_foto $komentar)
    {
        $komentar->delete();
        return back()->with("success","Komentar Berhasil Terhapus");
    }
}
