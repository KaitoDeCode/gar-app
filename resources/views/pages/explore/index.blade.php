@extends('layout.application')

@section('body')



    <div class="grid grid-cols-3 gap-5 p-5 mx-auto">
        @forelse ( $fotos as $foto )
            <div class="col-span-1 border rounded-lg w-80">
                <div class="relative z-10 flex justify-end">
                    <a href="{{ route('report.create', '') }}/{{$foto->id}}" class="text-xl text-red-600"><i class="fa fa-ban" aria-hidden="true"></i></a>
                </div>

                <img class="object-cover object-center w-full h-80" src="{{ asset('storage/uploads/'.$foto->file_image) }}" alt="">
                <hr>
                <h2 class="text-lg font-bold text-blue-600">{{ $foto->title }}</h2>
                <p>{{ $foto->deskripsi }}</p>
                <div class="flex items-center justify-between px-3 mt-3 mb-2">
                    <a class="px-3 text-white rounded-lg bg-sky-600" href="{{ route('lihatkomen',$foto->id) }}">Komentar</a>
                    <div class="flex gap-2">
                        @if ($foto->like->where('user_id', Auth::id())->count() > 0)
                                 <form action="{{route('like.destroy',$foto->id)}}"  method="post">
                                     @csrf
                                     @method('DELETE')
                                     <input type="hidden" name="foto_id" value="{{ $foto->id }}">
                                     <button class="flex items-center gap-1 text-2xl text-red-600" href=""> <p>{{ $foto->like->count() }}</p>   <i class="fa fa-heart" aria-hidden="true"></i></button>
                                 </form>
                        @else
                        <form action="{{route('like.store')}}"  method="post">
                            @csrf
                            <input type="hidden" name="foto_id" value="{{ $foto->id }}">
                            <button class="flex items-center gap-1 text-2xl" href=""> <p>{{ $foto->like->count() }}</p>  <i class="fa fa-heart-o" aria-hidden="true"></i></button>
                        </form>
                        @endif
                        <form action="{{route('favorite.store')}}"  method="post" class="flex items-center">
                            @csrf
                            <input type="hidden" name="foto_id" value="{{ $foto->id }}">
                            <button class="px-3 text-white bg-green-600 rounded-lg">
                               favorite
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty

        @endforelse
    </div>
@endsection
