<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $likes = Like::with('foto')->where('user_id',$user_id)->get();
        return view('pages.tersimpan.like',compact('likes'));
        
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
    public function store(StoreLikeRequest $request)
    {
        // dump($request-> foto_id );
        $like = new Like();
        $like->user_id = Auth::user()->id;
        $like->foto_id = $request->foto_id;
        $like->save();
        return back()->with('success', 'Foto telah dilike.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLikeRequest $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($foto_id)
    {

        $like = Like::where('user_id', Auth::id())->where('foto_id', $foto_id)->first();
        if ($like) {
            $like->delete();
            return back()->with('success', 'Like telah dihapus.');
        } else {
            return back()->with('error', 'Like tidak ditemukan.');
        }       //
    }
}
