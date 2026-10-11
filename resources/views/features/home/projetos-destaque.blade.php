<x-phgodoycosta.section
    id="projetos"
    lead="Os projetos que mais representam o meu trabalho. Cada card abre o estudo de caso completo."
>
    <x-slot:title>Projetos em <span class="vg-fade">destaque</span></x-slot:title>

    <div class="vg-projects-grid vg-projects-grid--quad">
        @foreach ($projects as $project)
            @php
                $poster = '/images/posts/' . $project->slug . '/poster.png';
            @endphp
            <x-phgodoycosta.project-card
                :title="$project->name"
                :description="$project->description"
                :stack="$project->tags->pluck('name')->all()"
                :href="'/projeto/' . $project->slug"
                :media="file_exists(public_path($poster)) ? $poster : null"
                :repo-href="$project->repository ?: null"
                cta="Ler artigo"
            />
        @endforeach
    </div>

    <div style="margin-top: var(--space-7)">
        <x-phgodoycosta.button href="/projects" variant="secondary" icon-right="arrow-right">Ver todos os projetos</x-phgodoycosta.button>
    </div>
</x-phgodoycosta.section>
