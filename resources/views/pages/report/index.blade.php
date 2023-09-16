@extends('layout.application')

@section('body')
    <div class="grid w-1/2 gap-4 mx-auto mt-20">
        @forelse ( $dataReport as $report )
            <div class="px-3 py-2 overflow-hidden border border-red-500 rounded-lg">
                    <div class="flex items-center justify-between py-2">
                        <h2 class="text-xl font-bold text-slate-900">{{$report->user->name}}</h2>
                        <form action="{{ route('hapusReport',$report->id) }}" class="flex items-center" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="px-4 py-1 text-sm text-white bg-green-600 rounded-lg" type="submit">Confirm</button>
                        </form>
                    </div>
                        <hr>
                    <p class="text-sm text-slate-600">{{ $report->isi_report }}</p>
             </div>

            @empty
            <div class="px-3 py-2 overflow-hidden border border-red-500 rounded-lg">
                    <div class="flex items-center justify-between py-2">
                        <h2 class="text-xl font-bold text-slate-900">System</h2>
                    </div>
                        <hr>
                    <p class="text-sm text-slate-600">Tidak ada report</p>
            </div>
        @endforelse
    </div>
@endsection
