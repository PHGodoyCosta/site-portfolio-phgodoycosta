<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Headers -->
        @php
            require __DIR__ . "/../../../resources/Components/header.blade.php";
        @endphp
        @vite('resources/css/app.css')

    </head>
    <body>
        <header class="d-flex flex-wrap justify-content-around py-3 mb-4">
            <h1>Hehe</h1>
            <ul class="nav nav-pills">
                <li class="nav-item p-2">
                    Home
                </li>
                <li class="nav-item p-2">Teste2</li>
            </ul>
        </header>
        <h1>Site do Godoyzinho</h1>
    </body>
</html>
