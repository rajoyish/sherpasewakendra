<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- FAVICON --}}
    <x-favicon/>

    {{-- SEO TITLE --}}
    {!! SEOMeta::generate() !!}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-xl">
{{-- SITE HEADER --}}
@include('layouts.site-header')

{{-- HOME MENU/NAVBAR --}}
@include('layouts.guest-nav')

{{-- CONTENT --}}
<main>
    @if (Session::has('success'))
        <x-alert-success/>
    @elseif(Session::has('error'))
        <x-alert-error/>
    @endif
    
    {{ $slot }}
</main>

{{-- FOOTER --}}
{{-- @include('layouts.home-footer') --}}
</body>

</html>
