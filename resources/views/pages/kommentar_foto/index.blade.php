@extends('layout.application')

@section('body')
    <div class="grid grid-cols-10 p-5">
        <div class="grid col-span-8 gap-y-4">
            @forelse ($komentar as $row)
                <div class="p-3 border-2 rounded-lg w-80 overflow-clip">
                    @if ($row->user->name == Auth::user()->name)
                    <div class="flex flex-row items-center justify-between">
                        <p class="font-bold text-sky-600">{{ $row->user->name }}</p>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('komentar.edit',$row->id) }}" class="flex items-center justify-center w-5 h-5 p-2 text-sm duration-200 bg-yellow-600 rounded-full text-yello-200 hover:bg-yellow-700"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <form action="{{ route('komentar.destroy',$row->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Data Anda akan Terhapus, Anda Yakin?')" class="flex items-center justify-center w-5 h-5 p-2 text-sm text-red-200 duration-200 bg-red-600 rounded-full hover:bg-red-700" type="submit">
                                    <i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                    @else
                    <p class="font-bold text-green-600">{{ $row->user->name }}</p>
                    @endif
                    <hr>
                    <p class="text-slate-500 overflow-clip">{{ $row->isi_komentar }}</p>
                </div>
            @empty
                <p>Tidak ada</p>
            @endforelse
            </div>
        <div class="col-span-2">
            <h1 class="text-2xl font-bold">Tambah Komentar</h1>
            <form action="{{ route('komentar.store') }}" method="POST">
                @csrf
                <input type="hidden" name="foto_id" value="{{ $foto_id }}">


                <label for="isi_komentar" class="block mb-2 text-sm font-medium text-gray-900 ">Komentar:</label>
                 @error('isi_komentar')
                     <p class="mb-3 text-center text-white bg-red-500 rounded-lg">Gak Boleh kosong</p>
                 @enderror
    <textarea id="isi_komentar" rows="4" name="isi_komentar" class="block p-2.5 w-full text-sm outline-none border-2 border-slate-400 rounded-lg text-slate-600 " placeholder="Tulis deskripsimu disini..."></textarea>
            <button id="button" class="w-full py-1 mt-5 text-center bg-blue-600 rounded-xl" type="submit">Kirim</button>

            </form>
        </div>
    </div>
@endsection
