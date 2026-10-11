@extends('layouts.app')

@section('title', $project->name . ' - Estudo de caso')

@section('meta')
        <meta property="og:site_name" content="Site Portfólio - Pedro Henrique Godoy Costa">
        <meta property="og:title" content="{{ $project->name }} - Estudo de caso" />
        <meta property="og:description" content="{{ $project->description }}" />
        <meta property="og:image" itemprop="image" content="https://phgodoycosta.com.br/images/posts/{{ $project->slug }}/wpp.png">
        <meta property="og:type" content="article" />
@endsection

@section('content')
    @php
        $author = ['name' => 'Pedro Henrique Godoy Costa'];

        $meta = [];
        if ($project->repository) {
            $meta[] = [
                'label' => 'Repositório',
                'value' => preg_replace('#^https?://#', '', rtrim($project->repository, '/')),
                'href' => $project->repository,
            ];
        }
        if ($project->tags->isNotEmpty()) {
            $meta[] = ['label' => 'Tecnologias', 'chips' => $project->tags->pluck('name')->all()];
        }
    @endphp

    <x-articles.reading-progress />

    <main>
        <x-articles.header
            :title="$project->name"
            :dek="$project->description"
            :author="$author"
            :meta="$meta ?: null"
        >
            <x-slot:kicker>
                <x-phgodoycosta.badge>Estudo de caso</x-phgodoycosta.badge>
            </x-slot:kicker>
        </x-articles.header>

        <div class="vg-article-layout" style="margin-top: var(--space-8)">
            <div class="vg-toc-col">
                @if (count($headings) >= 3)
                    <x-articles.table-of-contents :items="$headings" />
                @endif
            </div>

            <div class="vg-prose-col">
                <div class="vg-prose">
                    @if ($body->toHtml() !== '')
                        {{ $body }}
                    @else
                        <x-phgodoycosta.slot label="texto do artigo" ratio="16 / 9" />
                    @endif
                </div>
            </div>

            <div class="vg-spacer-col"></div>
        </div>

        <div style="max-width: calc(var(--measure-prose) + var(--space-5) * 2); margin: var(--space-10) auto 0; padding: 0 var(--space-5);">
            <x-articles.author-bio
                :name="$author['name']"
                role="Desenvolvedor full stack júnior · Fundador da Hestopim"
            >
                <x-phgodoycosta.button variant="secondary" size="sm" icon-right="arrow-up-right" href="https://github.com/PHGodoyCosta" target="_blank" rel="noopener noreferrer">
                    GitHub<span class="vg-sr-only"> (abre em nova aba)</span>
                </x-phgodoycosta.button>
                <x-phgodoycosta.button variant="secondary" size="sm" icon-right="arrow-right" href="/#contato">Falar comigo</x-phgodoycosta.button>
            </x-articles.author-bio>
        </div>

        {{-- Mocado: trocar por projetos semelhantes (mesmas tags) quando a regra existir. --}}
        <section aria-labelledby="continue-lendo" style="max-width: calc(var(--measure-prose) + var(--space-5) * 2); margin: var(--space-9) auto 0; padding: 0 var(--space-5);">
            <h2 id="continue-lendo" class="vg-t-label" style="margin: 0 0 var(--space-5); color: var(--ink-subtle); text-transform: uppercase;">Continue lendo</h2>
            @foreach ([['Eden', '/projeto/eden'], ['Projeto Sonora', '/projeto/sonora']] as [$relatedTitle, $relatedHref])
                <x-articles.post-item
                    :title="$relatedTitle"
                    :href="$relatedHref"
                    :author="$author['name']"
                    dek="[ subtítulo do artigo ]"
                    :tags="['[ tecnologias ]']"
                />
            @endforeach
        </section>
    </main>
@endsection
