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
            @if ($project->repository)
                <p class="fs-5 ms-2">
                    <span class="fw-bold">Link do repositório:</span>
                    <a href="{{ $project->repository }}" class="link-light">{{ $project->repository }}</a>
                </p>
            @endif
            <div class="d-flex p-3" style="gap: 5px">
                @foreach ($project->tags as $tag)
                    {{-- background-color: #00d8ff;border-color: #00c2e6;color: white --}}
                    <div class="tag" style="@php echo 'background-color: ' . $tag->backgroundColor . ';border-color: ' . $tag->borderColor . ';color: ' . $tag->color . ';'  @endphp">
                        <span>{{ $tag->name }}</span>
                    </div>
                @endforeach
            </div>
            <div>
                @php
                    echo $markdown;
                @endphp
            </div>
        </div>
    </body>
</html>
