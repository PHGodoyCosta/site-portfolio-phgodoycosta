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
            <link rel="stylesheet" href="/build/assets/app-DhVkvI4C.css">
            <link rel="stylesheet" href="/build/assets/home-BSzF_EDF.css">
        @endproduction

        @yield('styles')
    </head>
    <body>
        @include('components.layout.header')

        @yield('content')

        @include('components.layout.footer')

        @yield('scripts')
    </body>
</html>
