@extends('layout.application')

@section('body')
<div class="w-full px-10 mt-10 ">
    <div class="flex items-center justify-between px-10">
        <span class="px-6 py-2 rounded-lg bg-slate-600 text-slate-100">Halaman Albums</span>
        <a class="px-6 py-2 duration-200 bg-green-600 rounded-lg text-slate-100 hover:bg-green-700" href="{{ route('albums.create') }}">Tambahkan Album</a>
    </div>

    {{-- message --}}
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <div class="flex justify-center mx-auto mt-10">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    <table class="divide-y divide-gray-300 ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    No.
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Nama Album
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Jenis
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Lihat
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Edit
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">


                            {{-- @dump($albums) --}}

                            @forelse ( $albums as $i => $album )

                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $i+1 }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ $album->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ $album->kategori_album }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <a href="{{ route('albums.show',$album->id) }}" class="px-4 py-1 text-sm text-yellow-600 bg-yellow-200 rounded-full">Lihat</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('albums.edit',$album->id) }}" class="px-4 py-1 text-sm text-indigo-600 bg-indigo-200 rounded-full">Edit</a>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('albums.destroy',$album->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" name="submit" onclick="return confirm('Apakah anda ingin menghapus data')">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            @empty
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    1
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        Contoh Album
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    2021-1-12
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="px-4 py-1 text-sm text-indigo-600 bg-indigo-200 rounded-full">Edit</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full">Delete</a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection









    {{-- <div> --}}



{{--
        <table class="mx-auto mt-10 border border-collapse table-fixed border-slate-400">
            <thead>
                <tr>
                    <th class="py-2 text-lg font-semibold border w-14 text-slate-900 border-slate-400">No.</th>
                    <th class="py-2 text-lg font-semibold border w-60 text-slate-900 border-slate-400">Nama Albums</th>
                    <th class="py-2 text-lg font-semibold border w-60 text-slate-900 border-slate-400">Kategori</th>
                    <th class="py-2 text-lg font-semibold border w-60 text-slate-900 border-slate-400">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $album as $i => $data )
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->kategori }}</td>
                    <td>
                        <a href="{{ route('albums.edit') }}"><i class="bi bi-pencil-fill"></i></a>
                        <a href="{{ route('albums.destroy') }}"><i class="bi bi-trash3-fill"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="border border-slate-400" >0.</td>
                    <td class="border border-slate-400" >Contoh Album</td>
                    <td class="border border-slate-400" >Foto</td>
                    <td class="flex items-start justify-around py-2 " >
                        <a class="px-3 py-1 duration-200 bg-yellow-500 rounded-lg cursor-pointer text-slate-100 hover:bg-yellow-700">Edit <i class="bi bi-pencil-fill"></i></a>
                        <a class="px-3 py-1 duration-200 bg-red-500 rounded-lg cursor-pointer text-slate-100 hover:bg-red-700">Hapus <i class="bi bi-trash3-fill"></i></a>
                    </td>
                </tr>

                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection --}}
