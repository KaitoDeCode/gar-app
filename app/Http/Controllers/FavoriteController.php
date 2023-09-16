<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Requests\UpdateFavoriteRequest;
use App\Models\Favorite;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $favorites = Favorite::with('foto')->where('user_id',$user_id)->get();
        return view('pages.tersimpan.favorite',compact('favorites'));
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
    public function store(StoreFavoriteRequest $request)
    {
        // $like = new Favorite();
        // $like->user_id = Auth::user()->id;
        // $like->foto_id = $request->foto_id;
        // $like->save();
        // return back()->with('success', 'Foto telah menjadi favorite.');

        $user_id = Auth::user()->id;

        // Periksa apakah favorit sudah ada sebelumnya
        $existingFavorite = Favorite::where('foto_id', $request->foto_id)
                                    ->where('user_id', $user_id)
                                    ->first();

        if ($existingFavorite) {

            // Jika favorit sudah ada, bisa berikan respons atau lakukan tindakan lain yang sesuai
            return redirect()->back()->with('error', 'sudah menjadi favorite');
            // ...
        } else {
            // Buat entitas favorit baru
            $favorite = new Favorite();
            $favorite->foto_id = $request->foto_id;
            $favorite->user_id = $user_id;
            $favorite->save();

            // Redirect atau lakukan tindakan lain setelah penciptaan favorit

            return redirect()->back()->with('success', 'sukses ditambahkan ke favorite');

    }
}

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavoriteRequest $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($foto_id)
    {
        $favorite = Favorite::where('foto_id', $foto_id)->first();
        $favorite->delete();

        // Redirect atau lakukan tindakan lain setelah penghapusan favorit

        return redirect()->back()->with('success', 'Sukses dihapus');

    }
}
