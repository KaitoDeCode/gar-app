<script>
    function hiddenMessage(){
        document.getElementById("message").classList.add("hidden");
    }
</script>


@if (session('success'))
    <div id="message" class="absolute z-50 flex flex-col items-center justify-center p-5 -translate-x-1/2 bg-green-300 left-1/2" style="border-radius: 10px; backdrop-filter: blur(10px)">
        {{ session('success') }}
        <button class="absolute px-3 py-1 bg-green-100 rounded-full -right-3 -top-3" onclick="hiddenMessage()" >X</button>
    </div>
@endif

@if (session('error'))
    <div class="absolute z-50 p-5 bg-red-400 left-50%">
        {{ session('error') }}
    </div>
@endif



