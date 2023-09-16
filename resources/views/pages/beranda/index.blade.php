@extends('layout.application')


@section('body')
<section class="text-gray-600 body-font">
    <div class="container flex flex-col items-center px-5 py-24 mx-auto md:flex-row">
      <div class="w-5/6 mb-10 lg:max-w-lg lg:w-full md:w-1/2 md:mb-0">
        <img class="object-cover object-center rounded" alt="hero" src="{{ asset('beranda.jpg') }}">
      </div>
      <div class="flex flex-col items-center text-center lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 md:items-start md:text-left">
        <h1 class="mb-4 text-3xl font-medium text-gray-900 title-font sm:text-4xl">Simpan Kenanganmu
          <br class="hidden lg:inline-block">Dan juga Bagikan  ke orang lain
        </h1>
        <p class="mb-8 leading-relaxed">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, nostrum. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam, laboriosam. </p>
      </div>
    </div>
  </section>
@endsection
