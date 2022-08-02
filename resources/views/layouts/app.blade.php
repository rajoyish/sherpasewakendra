<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">

    {{-- SEO Title --}}
    {!! SEOMeta::generate() !!}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-xl">
    {{-- SITE HEADER --}}
    @include('layouts.site-header')

    {{-- HOME MENU/NAVBAR --}}
    @include('layouts.home-nav')

    {{-- CONTENT --}}
    <main>
        {{ $slot }}
    </main>

    {{-- FOOTER --}}
    {{-- @include('layouts.home-footer') --}}
</body>

</html>
