@extends('layouts.app')

@section('content')
        @include('features.home.hero')

        <div class="w-100 mt-4 section" style="background-color: var(--section-light-background);min-height: 200px;color: white">
            <h2 class="ms-3 fw-bold mb-2">Projetos Destaque</h2>
            <div>
                <a href="/projects" class="link-light link-offset-1 mb-2 ms-4" style="text-decoration: underline">🚀 Clique para ver todos os projetos</a>
            </div>
            <div class="d-flex p-3 justify-content-center flex-wrap" style="gap: 20px" id="portfolio">
                @foreach($projects as $project)
                    @include('components.shared.project-card', ["project" => $project])
                @endforeach
            </div>
        </div>
        <div class="w-100 mt-4 section" style="color: white;min-height: 200px;">
            <h2 class="ms-2 fw-bold">Habilidades</h2>
            <h3 class="fs-5 ms-1">Linguagens de programação e outras</h3>
            <div class="d-flex p-2 mt-3 flex-wrap mb-3" style="gap: 15px">
                @foreach ($tags as $tag)
                    @if ($tag->category == 'language')
                        @include("components.home.tag-card", ["tag" => $tag])
                    @endif
                @endforeach
            </div>
            <h3 class="fs-5 ms-1">Frameworks, bibliotecas e outros</h3>
            <div class="d-flex p-2 mt-3 flex-wrap mb-3" style="gap: 15px">
                @foreach ($tags as $tag)
                    @if ($tag->category == 'framework')
                        @include("components.home.tag-card", ["tag" => $tag])
                    @endif
                @endforeach
            </div>
            <h3 class="fs-5 ms-1">Ferramentas</h3>
            <div class="d-flex p-2 mt-3 flex-wrap mb-3" style="gap: 15px">
                @foreach ($tags as $tag)
                    @if ($tag->category == 'tool')
                        @include("components.home.tag-card", ["tag" => $tag])
                    @endif
                @endforeach
            </div>
            <h3 class="fs-5 ms-1">Extras</h3>
            <div class="d-flex p-2 mt-3 flex-wrap mb-3" style="gap: 15px">
                @foreach ($tags as $tag)
                    @if ($tag->category == 'extra')
                        @include("components.home.tag-card", ["tag" => $tag])
                    @endif
                @endforeach
            </div>
        </div>
        <div class="w-100 mt-4 section" style="background-color: var(--section-light-background);min-height: 200px;color: white">
            <h2 class="ms-2 fw-bold">Formação</h2>
            <p class="ms-3 fs-6 description_curso">Tentei reunir todos os cursos que fiz nesse apanhado, porém o meu aprendizado durante esses anos foi uma mistura de cursos online, projetos que eu fazia, vários simples para teste que eu acabei perdendo, lendo documentação, Stack Overflow, quebrando a cabeça, procurando por fontes para resolver aquele bug específico, revisando código dos outros... Mas dentre os cursos, esses são os principais</p>
            <ul class="d-flex p-2 mt-3 flex-wrap" style="gap: 0px">
                @foreach ($formations as $i => $formation)
                    @include("components.home.formation-course", ["formation" => $formation, "i" => $i])
                @endforeach
            </ul>
        </div>
        <div class="w-100 mt-4 section" style="color: white;min-height: 200px;" id="curriculo">
            <h2 class="fw-bold mt-2 fs-2 fs-md-1 text-center">Baixe o meu currículo!</h2>
            <div class="d-flex justify-content-center align-items-center mt-3">
                <a href="/documents/curriculo.pdf" target="_blank" class="card p-2 d-flex flex-column align-items-center" style="background-color: #1A1A1A;border: 3px solid white;">
                    <img src="/images/download_icon.png" alt="Icon para download do currículo" style="width: 70px">
                    <div class="card-body">
                        <h3 class="fw-normal text-center m-0 p-0" style="color: white;">Download</h3>
                    </div>
                </a>
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
@endsection

@section('scripts')
        <script>
            function hide_formation_description_text(id) {
                document.getElementById('description_complete_' + id).style.display = 'none';
                document.getElementById('description_resumed_' + id).style.display = 'block';
            }

            function show_formation_description_text(id) {
                document.getElementById('description_resumed_' + id).style.display = 'none';
                document.getElementById('description_complete_' + id).style.display = 'block';
            }
        </script>
@endsection
