<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tecnologia - {{ $tag->name }}</title>

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

        <h1 class="text-center fw-bold text-capitalize mb-2">Projetos com {{ $tag->name }}</h1>
        <div class="w-100 mt-4 section" style="background-color: var(--section-light-background);min-height: 200px;color: white">
            <h2 class="ms-3 fs-3">Mais Relevantes</h2>
            <div class="d-flex p-3 justify-content-center flex-wrap" style="gap: 20px">
                @foreach($tag->projects as $project)
                    <div class="project">
                        <div>
                            <a href="@php echo '/projeto/' . $project->slug; @endphp">
                                <img src="@php echo '/images/posts/' . $project->slug . '/poster.jpg' @endphp" alt="Poster do projeto">
                                <h3 class="fw-bold mt-2 text-capitalize">{{ $project->name }}</h3>
                                @if ($project->description)
                                    <p style="max-width: 200px" class="m-0">{{ $project->description }}</p>
                                @endif
                            </a>
                        </div>
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
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
