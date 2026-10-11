{{--
    Layout sem navbar e sem rodapé do site, para páginas que são um destino
    fechado em si (hoje só a /tree).
--}}
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @yield('meta')

        <title>@yield('title', 'Pedro Henrique Godoy Costa')</title>

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        @yield('styles')
    </head>
    <body>
        @yield('content')

        @yield('scripts')
    </body>
</html>
