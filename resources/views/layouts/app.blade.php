<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @yield('meta')

        <title>@yield('title', 'Pedro Henrique Godoy Costa - Site Portfólio')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Headers -->
        @include('components.layout.head')

        @env('local')
            @vite('resources/css/app.css')
            @vite('resources/css/home.css')
            @vite('resources/js/app.js')
        @endenv

        @production
            <link rel="stylesheet" href="/build/assets/app-5wKMzItK.css">
            <link rel="stylesheet" href="/build/assets/home-DfEHtwIX.css">
            <script type="module" src="/build/assets/app-C7Kv14eg.js"></script>
        @endproduction

        @yield('styles')
    </head>
    <body>
        @php
            $navCurrent = match (true) {
                request()->is('/') => 'Início',
                request()->is('blog') => 'Blog',
                request()->is('projects') || request()->is('projeto/*') => 'Projetos',
                default => null,
            };
        @endphp
        <x-layout.navbar :current="$navCurrent" />

        @yield('content')

        <x-layout.vg-footer />

        @yield('scripts')
    </body>
</html>
