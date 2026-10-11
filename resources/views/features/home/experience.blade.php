@php
    // Mockado por enquanto: os dados virão do banco quando a seção for ligada.
    $experiences = [
        [
            'title' => 'Eden',
            'description' => 'CTO e fundador, desde 2026.',
            'stack' => ['[ tecnologias ]'],
            'href' => '#',
        ],
        [
            'title' => 'Projeto Sonora',
            'description' => 'Programa desenvolvido do zero que gera cifras de aulas de violão automaticamente com IA, a partir da gravação da aula e de [ continuação da descrição ]',
            'stack' => ['[ tecnologias ]'],
            'href' => '#',
        ],
        [
            'title' => 'Talentos',
            'description' => 'SaaS que fundei para geração automática de currículos.',
            'stack' => ['[ tecnologias ]'],
            'href' => '#',
        ],
        [
            'title' => 'Temdebom',
            'description' => '[ descrição do projeto ]',
            'stack' => ['[ tecnologias ]'],
            'href' => '#',
        ],
    ];
@endphp

<x-phgodoycosta.section
    id="experiencia"
    lead="Uma seleção de papéis e produtos que construí até aqui. Cada card abre o artigo completo."
>
    <x-slot:title>Minha <span class="vg-fade">experiência</span></x-slot:title>

    <div class="vg-projects-grid vg-projects-grid--quad">
        @foreach ($experiences as $experience)
            <x-phgodoycosta.project-card
                :title="$experience['title']"
                :description="$experience['description']"
                :stack="$experience['stack']"
                :href="$experience['href']"
                cta="Ler artigo"
            />
        @endforeach
    </div>
</x-phgodoycosta.section>
