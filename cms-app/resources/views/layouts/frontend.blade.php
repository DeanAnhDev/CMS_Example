!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


        <meta charset="UTF-8">
        <title>@yield('title', 'Review Nhà')</title>

        {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=MuseoModerno&display=swap" rel="stylesheet">



</head>

    @include('layouts.inc.header')

    <main class="relative m-auto mt-14 max-w-6xl">
        @yield('content') {{-- Nội dung trang --}}
    </main>
    @stack('scripts') {{-- Nơi thêm JS từ các view con --}}


</html>
