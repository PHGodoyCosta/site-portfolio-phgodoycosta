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

        <style>
            .project-post *{
                max-width: 100%;
            }
        </style>

    </head>
    <body>
        @php
            require __DIR__ . "/../../../resources/Components/header.blade.php";
        @endphp
        <h1 class="text-center fw-bold text-capitalize">{{ $project->name }}</h1>
        <div class="container w-100">
            @if ($project->repository)
                <p class="fs-6 fs-md-5 ms-2">
                    <span class="fw-bold">Link do repositório:</span>
                    <a href="{{ $project->repository }}" class="link-light">{{ $project->repository }}</a>
                </p>
            @endif
            <div class="d-flex p-3" style="gap: 5px">
                @foreach ($project->tags as $tag)
                    @php
                        if (count($tag->projects) > 0) {
                            $linkTag = "#";
                        } else {
                            $linkTag = '/tag/' . $tag->slug;
                        }
                    @endphp
                    <a href="@php echo $linkTag; @endphp" target="_blank">
                        <div class="tag" style="@php echo 'background-color: ' . $tag->backgroundColor . ';border-color: ' . $tag->borderColor . ';color: ' . $tag->color . ';'  @endphp">
                            <span>{{ $tag->name }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="project-post pb-2">
                @php
                    echo $markdown;
                @endphp
            </div>
        </div>
    </body>
</html>
