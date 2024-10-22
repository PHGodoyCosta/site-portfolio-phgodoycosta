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
        {{-- <header class="d-flex flex-wrap justify-content-around py-3 mb-4">
            <h1>Hehe</h1>
            <ul class="nav nav-pills">
                <li class="nav-item p-2">
                    Home
                </li>
                <li class="nav-item p-2">Teste2</li>
            </ul>
        </header> --}}
        <div class="d-flex justify-content-center mt-5" style="gap: 25px;">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current








                  ="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
              </div>
        </div>
        <div class="w-100 mt-4 section" style="background-color: white;min-height: 200px;">
            <h2 class="text-center">Habilidades dominadas</h2>
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
        <div class="w-100 mt-4 section" style="color: white;min-height: 200px;">
            <h2 class="text-center">Projetos e Experiências adquiridas</h2>
            <div class="d-flex p-3" style="gap: 15px">
                <div class="project">
                    <img src="https://i.pinimg.com/enabled/564x/6d/7f/16/6d7f164634919b5be31d6bc24ef83a0f.jpg" alt="">
                    <h3>Projeto X</h3>
                    <div  class="d-flex p-3" style="gap: 5px">
                        <div class="tag" style="background-color: #00d8ff;border-color: #00c2e6;color: white">
                            <span>React</span>
                        </div>
                    </div>
                </div>
                <div class="project">
                    <img src="https://i.pinimg.com/enabled/564x/6d/7f/16/6d7f164634919b5be31d6bc24ef83a0f.jpg" alt="">
                    <h3>Projeto X</h3>
                    <div  class="d-flex p-3" style="gap: 5px">
                        <div class="tag" style="background-color: #00d8ff;border-color: #00c2e6;color: white">
                            <span>React</span>
                        </div>
                    </div>
                </div>
                <div class="project">
                    <img src="https://i.pinimg.com/enabled/564x/6d/7f/16/6d7f164634919b5be31d6bc24ef83a0f.jpg" alt="">
                    <h3>Projeto X</h3>
                    <div  class="d-flex p-3" style="gap: 5px">
                        <div class="tag" style="background-color: #00d8ff;border-color: #00c2e6;color: white">
                            <span>React</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
