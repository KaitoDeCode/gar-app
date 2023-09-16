@extends('layout.application')


@section('body')
<div class="col-span-2 mt-40 px-96">
    <h1 class="text-2xl font-bold">Edit Komentar</h1>
    <form action="{{ route('komentar.update',$komentar->id) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- <input type="hidden" name="foto_id" value="{{ $foto_id }}"> --}}


        <label for="isi_komentar" class="block mb-2 text-sm font-medium text-gray-900 ">Komentar:</label>
         @error('isi_komentar')
             <p class="mb-3 text-center text-white bg-red-500 rounded-lg">Gak Boleh kosong</p>
         @enderror
<textarea  id="isi_komentar" rows="4" name="isi_komentar" class="block p-2.5 w-full text-sm outline-none border-2 border-slate-400 rounded-lg text-slate-600 " placeholder="Tulis deskripsimu disini...">{{ $komentar->isi_komentar }}</textarea>
    <button id="button" class="w-full py-1 mt-5 text-center bg-blue-600 rounded-xl" type="submit">Edit</button>
    </form>
</div>
@endsection
