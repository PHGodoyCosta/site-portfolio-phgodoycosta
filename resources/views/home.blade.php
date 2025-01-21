<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PHGodoyCosta</title>

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
        <div class="d-flex justify-content-center mt-4" style="gap: 25px;">
            <img src="images/my_picture_1.png" alt="Imagem principal de Pedro Henrique Godoy Costa" style="width: 500px">
            <div>
                <p class="m-0">Olá! 👋 Meu nome é</p>
                <h1 class="mt-1 mb-2 fw-bold fs-2">Pedro Henrique Godoy Costa</h1>
                <h3 class="fs-3 mb-2">Programador e Front-End Developer Junior</h3>
                <p style="max-width: 500px">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id eveniet blanditiis, eum sapiente delectus perferendis excepturi architecto, accusantium veritatis sit tenetur recusandae! Quae enim error commodi culpa, placeat labore distinctio? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id eveniet blanditiis, eum sapiente delectus perferendis excepturi architecto, accusantium veritatis sit tenetur recusandae! Quae enim error commodi culpa, placeat labore distinctio?</p>
                <div class="d-flex align-items-center" style="gap: 20px">
                    <div class="d-flex align-items-center" style="gap: 5px">
                        <img src="images/instagram.png" alt="Imagem Icon do instagram" style="width: 35px">
                        <p class="m-0">&#64;phgodoycosta</p>
                    </div>
                    <div class="d-flex align-items-center" style="gap: 5px">
                        <img src="images/github_icon.png" alt="Imagem Icon do instagram" style="width: 35px">
                        <p class="m-0">/phgodoycosta</p>
                    </div>
                    <div class="d-flex align-items-center" style="gap: 5px">
                        <img src="images/linkedin_icon.png" alt="Imagem Icon do instagram" style="width: 35px">
                        <p class="m-0">/phgodoycosta</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 mt-4 section" style="background-color: var(--section-light-background);min-height: 200px;color: white">
            <h2 class="ms-3 fw-bold">Projetos Destaque</h2>
            <div class="d-flex p-3 justify-content-center" style="gap: 20px">
                @foreach($projects as $project)
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
                            <div class="tag" style="background-color: #00d8ff;border-color: #00c2e6;color: white">
                                <span>React</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="project">
                    <div>
                        <img src="https://i.pinimg.com/enabled/564x/6d/7f/16/6d7f164634919b5be31d6bc24ef83a0f.jpg" alt="">
                        <a href="#">
                            <h3 class="fw-bold mt-2">TemdeBom</h3>
                            <p style="max-width: 200px" class="m-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid nihil magni error perspiciatis porro expedita atque totam voluptas quo perferendis..</p>
                        </a>
                    </div>
                    <div  class="d-flex p-3" style="gap: 5px">
                        <div class="tag" style="background-color: #00d8ff;border-color: #00c2e6;color: white">
                            <span>React</span>
                        </div>
                    </div>
                </div>
                <div class="project">
                    <div>
                        <img src="https://i.pinimg.com/enabled/564x/6d/7f/16/6d7f164634919b5be31d6bc24ef83a0f.jpg" alt="">
                        <h3 class="fw-bold mt-2">Discipline</h3>
                        {{-- <p style="max-width: 200px" class="m-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid nihil magni error perspiciatis porro expedita atque totam voluptas quo perferendis..</p> --}}
                    </div>
                    <div  class="d-flex p-3" style="gap: 5px">
                        <div class="tag" style="background-color: #00d8ff;border-color: #00c2e6;color: white">
                            <span>React</span>
                        </div>
                    </div>
                </div>
                <div class="project">
                    <div>
                        <img src="https://i.pinimg.com/enabled/564x/6d/7f/16/6d7f164634919b5be31d6bc24ef83a0f.jpg" alt="">
                        <h3 class="fw-bold mt-2">Projeto X</h3>
                        {{-- <p style="max-width: 200px" class="m-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid nihil magni error perspiciatis porro expedita atque totam voluptas quo perferendis..</p> --}}
                    </div>
                    <div  class="d-flex p-3" style="gap: 5px">
                        <div class="tag" style="background-color: #00d8ff;border-color: #00c2e6;color: white">
                            <span>React</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 mt-4 section" style="color: white;min-height: 200px;">
            <h2 class="ms-2 fw-bold">Habilidades</h2>
            <div class="d-flex p-2" style="gap: 15px">
                <div class="skill">
                    <img src="images/typescript.png" alt="">
                    <span>Typescript</span>
                </div>
                <div class="skill">
                    <img src="images/js.png" alt="">
                    <span>Javascript</span>
                </div>
                <div class="skill">
                    <img src="images/php.png" alt="">
                    <span>PHP</span>
                </div>
                <div class="skill">
                    <img src="images/react.png" alt="">
                    <span>React</span>
                </div>
            </div>
        </div>
    </body>
</html>
