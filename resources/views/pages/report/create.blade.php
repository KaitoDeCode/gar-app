@extends('layout.application')

{{-- @dump($foto) --}}

@section('body')
    <div class="max-w-md mx-auto">
        <h1 class="text-xl font-body ">Buat Laporan</h1>
  <form action="{{ route('report.store', '') }}/{{$foto_id->id}}" class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md" method="post">
    @csrf

    <input type="hidden" name="foto_id" value="{{ $foto_id->id }}">
    <div class="mb-4">
      <label class="block mb-2 text-sm font-bold text-gray-700" for="report_content">
        Report Content:
      </label>
      <textarea name="isi_report" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="report_content" placeholder="Enter report content"></textarea>
      @error('isi_report')
            {{ message }}
      @enderror
    </div>
    <div class="flex items-center justify-between">
      <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="submit">
        Submit Report
      </button>
    </div>
  </form>
</div>
@endsection
