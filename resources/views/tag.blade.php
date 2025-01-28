<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Projetos com {{ $tag->name }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Headers -->
        @php
            require __DIR__ . "/../../../resources/Components/head.blade.php";
        @endphp

        <!-- Development -->
        {{-- @vite('resources/css/app.css')
        @vite('resources/css/home.css') --}}

        <!-- Production -->
        <link rel="stylesheet" href="/build/assets/app-DhVkvI4C.css">
        <link rel="stylesheet" href="/build/assets/home-BSzF_EDF.css">

    </head>
    <body>
        @php
            require __DIR__ . "/../../../resources/Components/header.blade.php";
        @endphp

        <h1 class="text-center fw-bold text-capitalize mb-2">Projetos com {{ $tag->name }}</h1>
        <div class="w-100 mt-4 section" style="background-color: var(--section-light-background);min-height: 200px;color: white">
            <h2 class="ms-3 fs-3">Mais Relevantes</h2>
            <div class="d-flex p-3 justify-content-center flex-wrap" style="gap: 20px">
                @foreach($tag->projects as $project)
                    @include('partials.project-card', ["project" => $project])
                @endforeach
            </div>
        </div>
    </body>
</html>
