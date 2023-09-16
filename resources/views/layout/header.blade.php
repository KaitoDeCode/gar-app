<header class="text-gray-600 body-font">
    <div class="container flex flex-col flex-wrap items-center p-5 mx-auto md:flex-row">
      <a class="flex items-center mb-4 font-medium text-gray-900 title-font md:mb-0">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 p-2 text-white bg-indigo-500 rounded-full" viewBox="0 0 24 24">
          <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </svg>
        <span class="ml-3 text-xl">Gallery App</span>
      </a>
      <nav class="flex flex-wrap items-center justify-center text-base md:ml-auto">
        <a href="{{ route('beranda') }}" class="mr-5 hover:text-gray-900">Beranda</a>
        <a href="{{ route('albums.index') }}" class="mr-5 hover:text-gray-900">Albums</a>
        <a href="{{ route('explore') }}" class="mr-5 hover:text-gray-900">Explore</a>
        <button  class="mr-5 hover:text-gray-900" onClick="showOption()">Tersimpan</button>
    </nav>
        <div id="tersimpan" class="absolute z-20 hidden top-14 right-44">
          <ul class="flex flex-col bg-white">
              <li class="duration-200 hover:font-semibold" ><a href="{{ route('like.index') }}">Disukai</a></li>
              <li class="duration-200 hover:font-semibold" ><a href="{{ route('favorite.index') }}">Favorite</a></li>
          </ul>
        </div>

      <form action="{{ route('logout') }}" method="POST">
        @csrf
        @method('POST')
        <button type="submit" class="inline-flex items-center px-3 py-1 mt-4 text-base bg-gray-100 border-0 rounded focus:outline-none hover:bg-gray-200 md:mt-0">Logout
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </button>
    </form>

    </div>
  </header>

<script>
    const tersimpan = document.getElementById('tersimpan');

    function showOption(){
        tersimpan.classList.toggle("hidden");
    }
</script>
