@extends('layout.application')

@section('body')

@if ($errors->any())
    <div class="fixed z-20 p-5 text-sm text-white bg-red-600 rounded-lg left-10">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('fotos.update',$foto->id) }}" method="post" class="flex flex-col gap-2 px-96" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
    <h2 class="mb-5 text-xl font-semibold text-center text-slate-700">Edit <span class="text-blue-700 ">Gambar</span></h2>
    <label for="title" class="flex flex-col">
        <span>Judul</span>
        <input value="{{ $foto->title }}" class="px-2 border rounded-lg outline-none border-slate-400 text-slate-400" type="text" name="title" id="title">
    </label>
    <input type="hidden" name="album_id" value="{{ $foto->album_id }}">
    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi:</label>
    <textarea id="deskripsi" rows="4" name="deskripsi" class="block p-2.5 w-full text-sm outline-none border-2 border-slate-400 rounded-lg text-slate-600 " placeholder="Tulis deskripsimu disini...">{{ $foto->deskripsi }}</textarea>
    <label for="file_image">
        <span>Unggah gambar</span>
        <img class="h-auto w-60" src="{{ asset('storage/uploads/'.$foto->file_image) }}" alt="">
        <input class=" file:rounded-lg file:border-blue-600 file:text-blue-300 file:bg-blue-700" type="file" name="file_image" id="file_image">
    </label>
    <div class="flex flex-col">
        <h3>Unggah sebagai:</h3>
        <label for="public">
            <input type="radio" name="visibility" id="public" value="public" @if ($foto->visibility=='public')
                checked
            @endif >
            <span>Public</span>
        </label>
        <label for="private">
            <input type="radio" name="visibility" id="private" value="private" @if ($foto->visibility=='private')
            checked
        @endif  >
            <span>Private</span>
        </label>
    </div>
    <button class="py-1 mb-10 bg-blue-700 rounded-lg" type="submit">Unggah</button>
</form>
</div>
</div>

@endsection
