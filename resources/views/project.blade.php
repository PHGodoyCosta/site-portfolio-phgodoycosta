<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Projeto - {{ $project->name }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Headers -->
        @php
            require __DIR__ . "/../../../resources/Components/head.blade.php";
        @endphp

        @vite('resources/css/app.css')
        @vite('resources/css/home.css')

    </head>
    <body>
        @php
            require __DIR__ . "/../../../resources/Components/header.blade.php";
        @endphp
        <h1 class="text-center fw-bold text-capitalize">{{ $project->name }}</h1>
        <div class="container">
            @php
                echo $project->tags;
            @endphp
            @if ($project->repository)
                <p class="fs-5 ms-2">
                    <span class="fw-bold">Link do repositório:</span>
                    <span>{{ $project->repository }}</span>
                </p>
            @endif
            <div>
                @php
                    echo $markdown;
                @endphp
            </div>
        </div>
    </body>
</html>
