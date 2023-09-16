<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'nullable|string',
            'album_id' =>'nullable',
            'deskripsi'=>'nullable|max:800|string',
            'file_video' => 'required|image|mimes:mp4,mkv|',
            'visibility' => 'nullable',
        ]);

        $video = $request->file('file_video');
        $videoName = uniqid() . '.' . $video->getClientOriginalExtension();
        $video->storeAs('public/uploads/', $videoName);

        $reels = new Video;
        $reels->title = $request->title;
        $reels->album_id = $request->album_id;
        $reels->deskripsi = $request->deskripsi;
        $reels->visibility = $request->visibility;
        $reels->file_video = $videoName;
        $reels->save();

        return back()->with('massage', 'Video berhasil diunggah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //
    }
}
