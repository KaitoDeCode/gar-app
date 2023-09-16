<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GarApp</title>
    @vite('resources/css/app.css')
    @include('layout.cdn')
</head>
<body>


    @include('layout.header')
    <main>
        @include('layout.massage')
        @yield('body')
    </main>

</body>
</html>
