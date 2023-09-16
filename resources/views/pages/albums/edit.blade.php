@extends('layout.application')

@section('body')
<div class="flex justify-center w-full ">
    <form class="p-5 py-10 mt-10 rounded-lg shadow-md" action="{{ route('albums.update',$album) }}" method="POST">
        @csrf
        @method('PUT')
        <h1 class="text-3xl font-bold text-blue-700">Edit Albumu</h1>
        {{-- <input type="hidden" name=""> --}}
        <label class="flex flex-col mt-5" for="name">
            <span class="text-lg font-semibold text-blue-700">Nama Album</span>
            <input class="px-3 border-2 rounded-lg border-slate-300" type="text" name="name" id="name" value="{{ $album->name }}" >
            @error('name')
                {{ $message }}
            @enderror
        </label>
        <button class="w-full py-1 mt-10 font-semibold text-white uppercase bg-blue-700 border rounded-lg" type="submit" >Buat</button>
    </form>
</div>
@endsection
