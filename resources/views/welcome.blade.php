<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex flex-col items-center justify-center w-full min-h-screen mx-auto bg-slate-900">
        <h1 class="mb-10 text-4xl font-bold text-white">GarApp</h1>
        <div class="flex flex-col w-40 gap-1 mt-5">
            <a class="w-full px-6 py-2 text-center duration-200 bg-green-700 rounded-lg hover:text-white hover:bg-green-600" href="{{ route('login') }}">Login</a>
            <p class="text-center text-slate-200">- or -</p>
            <a class="w-full px-6 py-2 text-center text-red-600 duration-200 border border-red-700 rounded-lg hover:bg-red-700 hover:text-white" href="{{ route('register') }}">Register</a>
        </div>
    </div>
</body>
</html>
