@extends('layout.application')

@section('body')
    <div class="flex justify-center w-full ">
        <form class="p-5 py-10 mt-10 rounded-lg shadow-md" action="{{ route('albums.store') }}" method="POST">
            @csrf
            <h1 class="text-3xl font-bold text-blue-700">Buat Album mu</h1>
            <input type="hidden" name="user_id" value="{{ Auth::user()->name }}">
            @error('user_id')
            {{ $message }}
        @enderror
            <label class="flex flex-col mt-5" for="name">
                <span class="text-lg font-semibold text-blue-700">Nama Album</span>
                <input class="px-3 border-2 rounded-lg border-slate-300" type="text" name="name" id="name">
                @error('name')
                    {{ $message }}
                @enderror
            </label>
            {{-- <div class="mt-5"> --}}
                {{-- <h3 class="text-lg font-semibold text-blue-700">Tipe Album</h3> --}}
                {{-- <label for="foto" class="flex items-center gap-2">
                    <input id="foto" type="radio" name="kategori_album" value="foto"><span>Foto</span>
                </label>
                <label for="video" class="flex items-center gap-2">
                    <input id="video" type="radio" name="kategori_album" value="video"><span>video</span>
                </label> --}}
                <input type="hidden" name="kategori_album" value="foto">
                @error('kategori_album')
                    {{ $message }}
                @enderror
            {{-- </div> --}}
            <button class="w-full py-1 mt-10 font-semibold text-white uppercase bg-blue-700 border rounded-lg" type="submit" >Buat</button>
        </form>
    </div>
@endsection
