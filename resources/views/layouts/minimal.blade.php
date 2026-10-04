{{--
    Layout sem navbar e sem rodapé do site, para páginas que são um destino
    fechado em si (hoje só a /tree). O head acompanha o layouts/app.blade.php:
    quando os hashes do build mudarem lá, mude aqui também.
--}}
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @yield('meta')

        <title>@yield('title', 'Pedro Henrique Godoy Costa')</title>

        @env('local')
            @vite('resources/css/app.css')
            @vite('resources/js/app.js')
        @endenv

        @production
            <link rel="stylesheet" href="/build/assets/app-5wKMzItK.css">
            <script type="module" src="/build/assets/app-C7Kv14eg.js"></script>
        @endproduction

        @yield('styles')
    </head>
    <body>
        @yield('content')

        @yield('scripts')
    </body>
</html>
