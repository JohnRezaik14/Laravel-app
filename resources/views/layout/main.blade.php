<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home')</title>
    {{-- @vite('resources/css/app.css') --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @section('navbar')
        <nav
            class="nav-bar  w-full bg-gray-200 shadow shadow-blue-100 text-xl flex flex-row gap-8 justify-center items-center h-14 font-bold text-blue-900 mb-3">
            <a class=" bg-gray-300 rounded-lg my-1 p-1  " href="{{ route('posts.index') }}">Home</a>
            <a class=" bg-gray-300 rounded-lg my-1 p-1  " href="{{ route('posts.create') }}">New Post</a>

        </nav>
    @show
    <div class=" m-auto flex flex-col max-w-[70%]">
        @yield('main-content')
        @yield('form')
    </div>
</body>

</html>
