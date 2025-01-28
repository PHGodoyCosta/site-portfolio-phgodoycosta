<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


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
        <div class="d-flex justify-content-center flex-column align-items-center flex-lg-row mt-4 w-100 mb-3 mb-md-0 gap-3 gap-md-0" style="gap: 0px;overflow: hidden" id="sobre-mim">
            <div style="max-width: 500px;" class="d-flex col-auto col-sm justify-content-center"> {{-- order-2 order-lg-1 --}}
                <img class="personal-image" src="images/my_picture_1.png" alt="Imagem principal de Pedro Henrique Godoy Costa" style="max-width: 85%">
            </div>
            <div class="col-auto"> {{-- order-lg-2 --}}
                <div class="w-75 w-sm-auto m-auto mx-sm-0">
                    <p class="m-0">Olá! 👋 Meu nome é</p>
                    <h1 class="mt-1 mb-2 fw-bold fs-4 fs-sm-2">Pedro Henrique Godoy Costa</h1>
                    <h3 class="fs-5 fs-sm-3 mb-2">Programador e Front-End Developer Junior</h3>
                </div>
                <p class="w-75 w-sm-auto m-auto mx-sm-0 mb-3 mb-sm-2 fs-6" style="max-width: 500px">Transformar ideias em <strong>soluções práticas</strong> é o que mais me motiva. Cada projeto que desenvolvi, seja para o portfólio ou para resolver problemas do dia a dia, carrega meu <strong>esforço</strong> e <strong>sonho</strong> de usar a <strong>tecnologia</strong> para impactar vidas. Com uma trajetória de <strong>aprendizado constante</strong> e uma paixão incansável por programação, estou pronto para transformar desafios em soluções reais. Quero <strong>colaborar</strong>, <strong>crescer</strong> e usar a tecnologia para construir um <strong>futuro melhor</strong>. Meu objetivo é ir além do código, criando um <strong>impacto duradouro</strong> e soluções que realmente <strong>transformem o mundo</strong>.</p>
                <div class="d-flex align-items-center flex-column flex-md-row" style="gap: 20px">
                    <a href="https://www.instagram.com/phgodoycosta/" class="d-flex align-items-center link-light" style="gap: 5px">
                        <img src="images/instagram.png" alt="Imagem Icon do instagram" style="width: 35px">
                        <p class="m-0">&#64;phgodoycosta</p>
                    </a>
                    <a href="https://github.com/PHGodoyCosta" class="d-flex align-items-center link-light" style="gap: 5px">
                        <img src="images/github_white_icon.png" alt="Imagem Icon do instagram" style="width: 35px">
                        <p class="m-0">/phgodoycosta</p>
                    </a>
                    <a href="https://www.linkedin.com/in/phgodoycosta/" class="d-flex align-items-center link-light" style="gap: 5px">
                        <img src="images/linkedin_icon.png" alt="Imagem Icon do instagram" style="width: 35px">
                        <p class="m-0">/phgodoycosta</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="w-100 mt-4 section" style="background-color: var(--section-light-background);min-height: 200px;color: white">
            <h2 class="ms-3 fw-bold mb-2">Projetos Destaque</h2>
            <div>
                <a href="/projects" class="link-light link-offset-1 mb-2 ms-4" style="text-decoration: underline">🚀 Clique para ver todos os projetos</a>
            </div>
            <div class="d-flex p-3 justify-content-center flex-wrap" style="gap: 20px" id="portfolio">
                @foreach($projects as $project)
                    @include('partials.project-card', ["project" => $project])
                @endforeach
            </div>
        </div>
        <div class="w-100 mt-4 section" style="color: white;min-height: 200px;">
            <h2 class="ms-2 fw-bold">Habilidades</h2>
            <h3 class="fs-5 ms-1">Linguagens de programação e outras</h3>
            <div class="d-flex p-2 mt-3 flex-wrap mb-3" style="gap: 15px">
                @foreach ($tags as $tag)
                    @if ($tag->category == 'language')
                        @include("partials.tag-card", ["tag" => $tag])
                    @endif
                @endforeach
            </div>
            <h3 class="fs-5 ms-1">Frameworks, bibliotecas e outros</h3>
            <div class="d-flex p-2 mt-3 flex-wrap mb-3" style="gap: 15px">
                @foreach ($tags as $tag)
                    @if ($tag->category == 'framework')
                        @include("partials.tag-card", ["tag" => $tag])
                    @endif
                @endforeach
            </div>
            <h3 class="fs-5 ms-1">Ferramentas</h3>
            <div class="d-flex p-2 mt-3 flex-wrap mb-3" style="gap: 15px">
                @foreach ($tags as $tag)
                    @if ($tag->category == 'tool')
                        @include("partials.tag-card", ["tag" => $tag])
                    @endif
                @endforeach
            </div>
            <h3 class="fs-5 ms-1">Extras</h3>
            <div class="d-flex p-2 mt-3 flex-wrap mb-3" style="gap: 15px">
                @foreach ($tags as $tag)
                    @if ($tag->category == 'extra')
                        @include("partials.tag-card", ["tag" => $tag])
                    @endif
                @endforeach
            </div>
        </div>
        <div class="w-100 mt-4 section" style="background-color: var(--section-light-background);min-height: 200px;color: white" id="contato">
            <h2 class="ms-2 fw-bold">Formações</h2>
            <p class="ms-3 fs-6 description_curso">Tentei reunir todos os cursos que fiz nesse apanhado, porém o meu aprendizado durante esses anos foi uma mistura de cursos online, projetos que eu fazia, vários simples para teste que eu acabei perdendo, lendo documentação, Stack Overflow, quebrando a cabeça, procurando por fontes para resolver aquele bug específico, revisando código dos outros... Mas dentre os cursos, esses são os principais</p>
            <div class="d-flex p-2 mt-3 flex-wrap" style="gap: 15px">
                <ul>
                    @foreach ($formations as $formation)
                        @include("partials.formation-course", ["formation" => $formation])
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="w-100 mt-4 section" style="background-color: var(--section-light-background);min-height: 200px;color: white" id="contato">
            <div class="d-flex justify-content-center mt-4 flex-column flex-md-row align-items-center align-items-md-start" style="gap: 50px;"> {{--gap: 100px--}}
                <div class="w-75 w-md-auto">
                    <h2 class="fw-bold mb-4 fs-2 fs-md-1">Entre em contato comigo</h2>
                    <div class="d-flex flex-column" style="gap: 20px">
                        <a href="https://wa.me/5584991497337?text=Oi%20Pedro!%20Vim%20pelo%20seu%20site%20e%20tenho%20interesse%20nos%20seus%20servi%C3%A7os" class="button-contato d-flex align-items-center" style="gap: 10px">
                            <img src="/images/whatsapp_icon.png" alt="Icone do whatsapp" style="max-width: 50px;">
                            <span class="fs-5">Me envie uma mensagem</span>
                        </a>
                        <a href="mailto:phgodoycosta@gmail.com" class="button-contato button-email d-flex align-items-center" style="gap: 10px">
                            <img src="/images/email_icon.png" alt="Icone do whatsapp" style="max-width: 50px;">
                            <span class="fs-5">Me envie um email</span>
                        </a>
                    </div>
                </div>
                <div style="max-width: 500px;" class="m-auto mx-md-0">
                    <img src="images/f2.png" alt="Imagem segundária de Pedro Henrique Godoy Costa" style="max-width: 500px" class="p-3 personal-image">
                </div>
            </div>
        </div>
    </body>
</html>
