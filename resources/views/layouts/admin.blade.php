<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- FAVICON --}}
    <x-favicon />

    {{-- SEO TITLE --}}
    {!! SEOMeta::generate() !!}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-xl h-full">
    <div x-data="{ open: false }" @keydown.window.escape="open = false">

        {{-- NAVIGATION --}}
        @include('layouts.admin-navigation')
        {{-- END OF NAVIGATION --}}

        <div class="flex flex-col md:pl-64">
            {{-- PROFILE NAVIGATION --}}
            @include('layouts.admin-profile-nav')
            {{-- END OF PROFILE NAVIGATION --}}

            {{-- CONTENT --}}
            <main class="flex-1">

                @if (Session::has('success'))
                    <x-alert-success/>
                @elseif(Session::has('error'))
                    <x-alert-error/>
                @endif

                {{ $slot }}
            </main>
            {{-- END OF CONTENT --}}
        </div>
    </div>
</body>

</html>
