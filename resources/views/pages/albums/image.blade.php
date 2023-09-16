@extends('layout.application')


@section('body')
    <div class="grid grid-cols-5 px-10 ">

        <div class="col-span-4 border">
            <h1 class="text-xl font-semibold text-slate-700">Album <span class="text-2xl text-blue-700 underline underline-offset-2">{{$album->name}}</span></h1>
            <div class="grid grid-cols-4 px-4 pt-5 gap-y-4">
                @forelse ( $fotos as $foto )
                    <div class="p-3 border rounded-lg w-52">
                        <h3 class="text-lg font-semibold text-blue-600">{{ $foto->title }}</h3>
                         <img class="object-cover object-center w-full h-40" src="{{ asset('storage/uploads/'.$foto->file_image) }}" alt="">
                         <p class="mb-5 text-sm text-slate-500">{{ $foto->deskripsi }}</p>
                         <div class="flex flex-row justify-between">
                            @if ($foto->visibility == 'public')
                            <div class="flex items-center justify-center px-3 text-sm text-white rounded-xl bg-sky-600">{{ $foto->visibility }}</div>
                            @else
                            <div class="flex items-center justify-center px-3 text-sm text-center text-white rounded-xl bg-slate-500">{{ $foto->visibility }}</div>
                            @endif
                                <form class="flex gap-1" action="{{ route('fotos.destroy',$foto->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('fotos.edit',$foto->id)}}" class="flex items-center justify-center w-5 h-5 p-3 text-sm text-white duration-200 bg-yellow-500 rounded-full hover:bg-yellow-600" type="submit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <button onclick="return confirm('Data kamu akan terhapus, anda Yakin')" class="flex items-center justify-center w-5 h-5 p-3 text-sm text-white duration-200 bg-red-600 rounded-full hover:bg-red-700" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>

                         </div>
                         <div class="flex flex-col items-center gap-2 mt-7">
                            <a class="w-full text-center duration-200 rounded-lg text-slate-300 bg-sky-600 hover:bg-sky-800" href="{{  route('lihatkomen',$foto->id) }}">Lihat Komentar</a>
                            <a class="w-full text-center duration-200 bg-red-700 rounded-lg text-slate-300 hover:bg-red-800" href="{{ route('lihatreport',$foto->id ) }}">Lihat Report</a>
                         </div>
                    </div>
                @empty



                @endforelse
            </div>
        </div>


        <div class="col-span-1 overflow-hidden border border-red-500">

<form action="{{ route('fotos.store') }}" method="post" class="flex flex-col gap-2 px-3" enctype="multipart/form-data">
    @csrf
    <h2 class="mb-5 text-xl font-semibold text-center text-slate-700">Tambah <span class="text-blue-700 ">Foto</span></h2>
    <label for="title">
        @error('title')
        <p class="text-sm italic text-red-500">{{ $message }}</p>
    @enderror
        <span>Judul</span>
        <input class="px-2 border rounded-lg outline-none border-slate-400 text-slate-400" type="text" name="title" id="title">
    </label>
    <input type="hidden" name="album_id" value="{{$album->id}}">

    @error('deskripsi')
            <p class="text-sm italic text-red-500">{{ $message }}</p>
        @enderror
    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi:</label>
    <textarea id="deskripsi" rows="4" name="deskripsi" class="block p-2.5 w-full text-sm outline-none border-2 border-slate-400 rounded-lg text-slate-600 " placeholder="Tulis deskripsimu disini..."></textarea>
    <label for="file_image">
         @error('file_image')
        <p class="text-sm italic text-red-500">{{ $message }}</p>
             @enderror
        <span>Unggah foto</span>
        <input class=" file:rounded-lg file:border-blue-600 file:text-blue-300 file:bg-blue-700" type="file" name="file_image" id="file_image">
    </label>
    <div class="flex flex-col">
        <h3>Unggah sebagai:</h3>
        <label for="public">
            <input type="radio" name="visibility" id="public" value="public">
            <span>Public</span>
        </label>
        <label for="private">
            <input type="radio" name="visibility" id="private" value="private" checked>
            <span>Private</span>
        </label>
    </div>
    <button class="py-1 mb-10 bg-blue-700 rounded-lg" type="submit">Unggah</button>
</form>

        </div>
    </div>
@endsection
