@extends('layout.application')

@section('body')
<div class="grid grid-cols-3 gap-20 px-5 ">
@forelse ( $favorites as $like )
<div class="col-span-1 rounded-l g borde r w-80">
    <div class="relative z-10 flex justify-end">
        <a href="{{ route('report.create', '') }}/{{$like->foto->id}}" class="text-xl text-red-600"><i class="fa fa-ban" aria-hidden="true"></i></a>
    </div>

    <img class="object-cover object-center w-full h-80" src="{{ asset('storage/uploads/'.$like->foto->file_image) }}" alt="">
    <hr>
    <h2 class="text-lg font-bold text-blue-600">{{ $like->foto->title }}</h2>
    <p>{{ $like->foto->deskripsi }}</p>
    <div class="flex items-center justify-between px-3 mt-3 mb-2">
        <a class="px-3 text-white rounded-lg bg-sky-600" href="{{ route('lihatkomen',$like->foto->id) }}">Komentar</a>
        <div class="flex gap-2">


            @if ($like->foto->like->where('user_id',Auth::id())->count() > 0)
                     <form action="{{route('like.destroy',$like->foto->id)}}"  method="post">
                         @csrf
                         @method('DELETE')
                         <input type="hidden" name="foto_id" value="{{ $like->foto->id }}">
                         <button class="flex items-center gap-1 text-2xl text-red-600" href=""> <p>{{ $like->foto->like->count() }}</p>   <i class="fa fa-heart" aria-hidden="true"></i></button>
                     </form>
            @else
            <form action="{{route('like.store')}}"  method="post">
                @csrf
                <input type="hidden" name="foto_id" value="{{ $like->foto->id }}">
                <button class="flex items-center gap-1 text-2xl" href=""> <p>{{ $like->foto->like->count() }}</p>  <i class="fa fa-heart-o" aria-hidden="true"></i></button>
            </form>
            @endif



            <form action="{{route('favorite.destroy',$like->foto->id)}}"  method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="foto_id" value="{{ $like->foto->id }}">
                <button class="px-3 text-white bg-green-600 rounded-lg">
                    Hapus
                 </button>
            </form>

        </div>
    </div>
</div>
@empty
<p class="text-lg font-bold text-sky-600">Tidak ada yang kamu Favorite kan</p>
@endforelse
</div>

@endsection
