@extends('layouts.app')

@section('title', 'Design system — Pedro Henrique Godoy Costa')

@section('content')
<main style="max-width: var(--container); margin: 0 auto; padding: var(--space-7) var(--space-4) var(--space-9);">

    <header style="margin-bottom: var(--space-7);">
        <span class="vg-t-label" style="color: var(--ink-subtle);">PHGodoyCosta Design</span>
        <h1 class="vg-t-display-md" style="margin: var(--space-2) 0 0;">Design system</h1>
        <p class="vg-t-body" style="color: var(--ink-muted); max-width: var(--measure-lead); margin-top: var(--space-2);">
            Catálogo dos componentes compartilhados do portfólio, com todas as variações para conferência visual.
        </p>
    </header>

    {{-- Botão --}}
    <section style="margin-bottom: var(--space-8);">
        <h2 class="vg-t-heading-md">Button</h2>
        <p class="vg-t-body-sm" style="color: var(--ink-muted); margin-top: var(--space-1);">Primário, secundário, ghost e link.</p>

        <div style="margin-top: var(--space-5); padding: var(--space-5); background: var(--surface); border: 1px solid var(--line); border-radius: var(--radius-lg); display: flex; flex-direction: column; gap: var(--space-5);">

            <div style="display: flex; align-items: center; gap: var(--space-4); flex-wrap: wrap;">
                <span class="vg-t-label" style="width: 96px; flex-shrink: 0; color: var(--ink-subtle);">Primário</span>
                <x-phgodoycosta.button>Ver projetos</x-phgodoycosta.button>
                <x-phgodoycosta.button icon-right="arrow-right">Ler artigo</x-phgodoycosta.button>
                <x-phgodoycosta.button size="lg" icon-right="arrow-up-right" href="#" target="_blank" rel="noopener noreferrer">
                    Entrar em contato <span class="vg-sr-only">(abre em nova aba)</span>
                </x-phgodoycosta.button>
                <x-phgodoycosta.button size="sm">Enviar</x-phgodoycosta.button>
            </div>

            <div style="display: flex; align-items: center; gap: var(--space-4); flex-wrap: wrap;">
                <span class="vg-t-label" style="width: 96px; flex-shrink: 0; color: var(--ink-subtle);">Secundário</span>
                <x-phgodoycosta.button variant="secondary" icon="download">Baixar currículo</x-phgodoycosta.button>
                <x-phgodoycosta.button variant="secondary">Cancelar</x-phgodoycosta.button>
                <x-phgodoycosta.button variant="secondary" size="sm">Filtrar</x-phgodoycosta.button>
            </div>

            <div style="display: flex; align-items: center; gap: var(--space-4); flex-wrap: wrap;">
                <span class="vg-t-label" style="width: 96px; flex-shrink: 0; color: var(--ink-subtle);">Ghost</span>
                <x-phgodoycosta.button variant="ghost" icon="copy">Copiar link</x-phgodoycosta.button>
                <x-phgodoycosta.button variant="ghost" icon="bookmark">Salvar</x-phgodoycosta.button>
                <x-phgodoycosta.button variant="ghost" icon-only icon="share-2" aria-label="Compartilhar" />
            </div>

            <div style="display: flex; align-items: center; gap: var(--space-4); flex-wrap: wrap;">
                <span class="vg-t-label" style="width: 96px; flex-shrink: 0; color: var(--ink-subtle);">Link</span>
                <x-phgodoycosta.button variant="link" icon-right="arrow-up-right" href="#" target="_blank" rel="noopener noreferrer">
                    Ver repositório <span class="vg-sr-only">(abre em nova aba)</span>
                </x-phgodoycosta.button>
                <x-phgodoycosta.button variant="link" icon-right="chevron-down">Ler mais</x-phgodoycosta.button>
            </div>

            <div style="display: flex; align-items: center; gap: var(--space-4); flex-wrap: wrap;">
                <span class="vg-t-label" style="width: 96px; flex-shrink: 0; color: var(--ink-subtle);">Estados</span>
                <x-phgodoycosta.button disabled>Desabilitado</x-phgodoycosta.button>
                <x-phgodoycosta.button variant="secondary" disabled>Desabilitado</x-phgodoycosta.button>
                <x-phgodoycosta.button variant="secondary">
                    Pesquisar
                    <x-phgodoycosta.kbd>Ctrl</x-phgodoycosta.kbd>
                    <x-phgodoycosta.kbd>K</x-phgodoycosta.kbd>
                </x-phgodoycosta.button>
            </div>

        </div>
    </section>

    {{-- Badge --}}
    <section style="margin-bottom: var(--space-8);">
        <h2 class="vg-t-heading-md">Badge</h2>
        <p class="vg-t-body-sm" style="color: var(--ink-muted); margin-top: var(--space-1);">Chips de tecnologia, status e teclas.</p>

        <div style="margin-top: var(--space-5); padding: var(--space-5); background: var(--surface); border: 1px solid var(--line); border-radius: var(--radius-lg); display: flex; flex-direction: column; gap: var(--space-5);">

            <div style="display: flex; align-items: center; gap: var(--space-3); flex-wrap: wrap;">
                <span class="vg-t-label" style="width: 96px; flex-shrink: 0; color: var(--ink-subtle);">Tecnologia</span>
                <x-phgodoycosta.badge>TypeScript</x-phgodoycosta.badge>
                <x-phgodoycosta.badge>React</x-phgodoycosta.badge>
                <x-phgodoycosta.badge>ElectronJS</x-phgodoycosta.badge>
                <x-phgodoycosta.badge>NestJS</x-phgodoycosta.badge>
                <x-phgodoycosta.badge>Bootstrap</x-phgodoycosta.badge>
            </div>

            <div style="display: flex; align-items: center; gap: var(--space-3); flex-wrap: wrap;">
                <span class="vg-t-label" style="width: 96px; flex-shrink: 0; color: var(--ink-subtle);">Status</span>
                <x-phgodoycosta.badge variant="ice" dot>Open source</x-phgodoycosta.badge>
                <x-phgodoycosta.badge variant="sand" dot>[ disponível para projetos ]</x-phgodoycosta.badge>
                <x-phgodoycosta.badge variant="outline">
                    <x-icon name="map-pin" :size="13" />
                    Campo Grande, MS
                </x-phgodoycosta.badge>
            </div>

            <div style="display: flex; align-items: center; gap: var(--space-3); flex-wrap: wrap;">
                <span class="vg-t-label" style="width: 96px; flex-shrink: 0; color: var(--ink-subtle);">Teclas</span>
                <span style="display: inline-flex; gap: 4px;">
                    <x-phgodoycosta.kbd>Ctrl</x-phgodoycosta.kbd>
                    <x-phgodoycosta.kbd>K</x-phgodoycosta.kbd>
                </span>
                <span style="display: inline-flex; gap: 4px;">
                    <x-phgodoycosta.kbd>Esc</x-phgodoycosta.kbd>
                </span>
            </div>

        </div>
    </section>

    {{-- Field --}}
    <section style="margin-bottom: var(--space-8);">
        <h2 class="vg-t-heading-md">Field</h2>
        <p class="vg-t-body-sm" style="color: var(--ink-muted); margin-top: var(--space-1);">Campo de texto, área de texto, busca e erro.</p>

        <div style="margin-top: var(--space-5); padding: var(--space-5); background: var(--surface); border: 1px solid var(--line); border-radius: var(--radius-lg); display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-7);">

            <x-phgodoycosta.field
                label="Nome"
                placeholder="[ seu nome ]"
                help="Como você gostaria de ser chamado."
            />

            <x-phgodoycosta.field
                label="E-mail"
                type="email"
                value="pedro@"
                error="informe um endereço completo, como nome@dominio.com."
            />

            <x-phgodoycosta.field
                label="Buscar no blog"
                hide-label
                icon="search"
                :kbd="['Ctrl', 'K']"
                placeholder="Buscar artigos"
            />

            <x-phgodoycosta.field
                label="Mensagem"
                multiline
                placeholder="[ conte sobre o projeto ]"
            />

        </div>
    </section>

    {{-- Habilidades --}}
    <section style="margin-bottom: var(--space-8);">
        <h2 class="vg-t-heading-md">SkillGroup</h2>
        <p class="vg-t-body-sm" style="color: var(--ink-muted); margin-top: var(--space-1);">Grupos de habilidades com logos em um tom só; monograma para marcas sem logo.</p>

        <div style="margin-top: var(--space-5); padding: var(--space-5); background: var(--surface); border: 1px solid var(--line); border-radius: var(--radius-lg); display: flex; flex-direction: column; gap: var(--space-7);">

            <x-phgodoycosta.skill-group title="Linguagens" :skills="[
                ['name' => 'JavaScript', 'icon' => 'javascript'],
                ['name' => 'PHP', 'icon' => 'php'],
                ['name' => 'TypeScript', 'icon' => 'typescript'],
                ['name' => 'Python', 'icon' => 'python'],
                ['name' => 'SQL', 'mono' => 'SQL'],
                ['name' => 'HTML e CSS', 'icon' => 'html'],
            ]" />

            <x-phgodoycosta.skill-group title="Frameworks e bibliotecas" :skills="[
                ['name' => 'Bootstrap', 'icon' => 'bootstrap'],
                ['name' => 'React', 'icon' => 'react'],
                ['name' => 'Laravel', 'icon' => 'laravel'],
                ['name' => 'TypeORM', 'icon' => 'typeorm'],
                ['name' => 'ElectronJS', 'icon' => 'electron'],
                ['name' => 'NestJS', 'icon' => 'nestjs'],
                ['name' => 'NextJS', 'icon' => 'nextjs'],
                ['name' => 'Sass', 'icon' => 'sass'],
                ['name' => 'Pandas', 'icon' => 'pandas'],
                ['name' => 'Selenium', 'icon' => 'selenium'],
                ['name' => 'Prisma', 'icon' => 'prisma'],
                ['name' => 'Tailwind', 'icon' => 'tailwind'],
            ]" />

            <x-phgodoycosta.skill-group title="Ferramentas" :skills="[
                ['name' => 'Git', 'icon' => 'git'],
                ['name' => 'Visual Studio Code', 'mono' => 'VS'],
                ['name' => 'Figma', 'icon' => 'figma'],
                ['name' => 'Trello', 'icon' => 'trello'],
                ['name' => 'Miro', 'icon' => 'miro'],
                ['name' => 'Teams', 'mono' => 'Tm'],
                ['name' => 'GitHub', 'icon' => 'github'],
            ]" />

            <x-phgodoycosta.skill-group title="Extras" :skills="[
                ['name' => 'Excel', 'mono' => 'Xl'],
                ['name' => 'AWS', 'mono' => 'AWS'],
                ['name' => 'Digital Ocean', 'icon' => 'digitalocean'],
            ]" />

        </div>
    </section>

    {{-- Navbar --}}
    <section style="margin-bottom: var(--space-8);">
        <h2 class="vg-t-heading-md">Navbar</h2>
        <p class="vg-t-body-sm" style="color: var(--ink-muted); margin-top: var(--space-1);">Barra fixa e translúcida; no mobile vira botão de menu com folha lateral.</p>

        <div style="margin-top: var(--space-5); padding: var(--space-5); background: var(--surface); border: 1px solid var(--line); border-radius: var(--radius-lg); display: flex; flex-direction: column; gap: var(--space-5);">

            <div>
                <span class="vg-t-label" style="display: block; margin-bottom: var(--space-2); color: var(--ink-subtle);">Desktop, em repouso</span>
                <div style="width: 100%; height: 80px; overflow: hidden; border: 1px solid var(--line); border-radius: var(--radius-lg); position: relative;">
                    <x-layout.navbar current="Início" :scrolled="false" style="position: static;" />
                </div>
            </div>

            <div>
                <span class="vg-t-label" style="display: block; margin-bottom: var(--space-2); color: var(--ink-subtle);">Desktop, após rolar, com busca</span>
                <div style="width: 100%; height: 80px; overflow: hidden; border: 1px solid var(--line); border-radius: var(--radius-lg); position: relative;">
                    <x-layout.navbar current="Blog" :scrolled="true" style="position: static;">
                        <x-slot:actions>
                            <x-phgodoycosta.button variant="secondary" size="sm" icon="search">
                                Buscar
                                <x-phgodoycosta.kbd>Ctrl</x-phgodoycosta.kbd>
                                <x-phgodoycosta.kbd>K</x-phgodoycosta.kbd>
                            </x-phgodoycosta.button>
                        </x-slot:actions>
                    </x-layout.navbar>
                </div>
            </div>

            <div>
                <span class="vg-t-label" style="display: block; margin-bottom: var(--space-2); color: var(--ink-subtle);">Mobile, menu aberto</span>
                <div style="width: 390px; max-width: 100%; height: 370px; overflow: hidden; border: 1px solid var(--line); border-radius: var(--radius-lg); position: relative;">
                    <x-layout.navbar force-mobile default-open current="Projetos" :scrolled="true" style="position: static;" />
                </div>
            </div>

        </div>
    </section>

    {{-- Timeline --}}
    <section style="margin-bottom: var(--space-8);">
        <h2 class="vg-t-heading-md">Timeline</h2>
        <p class="vg-t-body-sm" style="color: var(--ink-muted); margin-top: var(--space-1);">Linha do tempo de formação, com "Ler mais" recolhível.</p>

        <div style="margin-top: var(--space-5); padding: var(--space-5); background: var(--surface); border: 1px solid var(--line); border-radius: var(--radius-lg);">
            <x-phgodoycosta.timeline :items="[
                [
                    'year' => '[ período ]',
                    'title' => '[ Curso de graduação ], UFMS',
                    'excerpt' => '[ uma ou duas frases sobre o curso e o que ele muda na forma como você programa ]',
                ],
                [
                    'year' => '2019',
                    'title' => 'Curso de Python (Mundo 1 e 2)',
                    'excerpt' => 'Esse curso que me introduziu à programação. Comecei por um sonho de criança, que era fazer uma I.A. igual ao J.A.R.V.I.S.',
                    'body' => '[ continuação do texto do curso ]',
                    'defaultOpen' => true,
                ],
                [
                    'year' => '2020',
                    'title' => 'Curso de JavaScript',
                    'excerpt' => 'Esse curso que me criou o interesse pela área da web. Aprendi a introdução de HTML e CSS aqui e depois fui aprimorando sozinho.',
                    'body' => '[ continuação do texto do curso ]',
                ],
                [
                    'year' => '2021',
                    'title' => 'Curso de C#',
                    'excerpt' => 'Como C# é uma linguagem nativa para Windows, decidi fazer o curso para ver se gostava dessa área, das linguagens que constroem programas de computador.',
                    'body' => '[ continuação do texto do curso ]',
                ],
            ]" style="max-width: var(--measure-prose);" />
        </div>
    </section>

    {{-- Cabeçalho de artigo --}}
    <section style="margin-bottom: var(--space-8);">
        <h2 class="vg-t-heading-md">ArticleHeader</h2>
        <p class="vg-t-body-sm" style="color: var(--ink-muted); margin-top: var(--space-1);">Abertura de um estudo de caso: kicker, título, subtítulo, assinatura, ficha técnica e barra de ações.</p>

        <div style="margin-top: var(--space-5); background: var(--surface); border: 1px solid var(--line); border-radius: var(--radius-lg); overflow: hidden;">
            <x-articles.header
                title="Discipline"
                dek="Uma alternativa para os estudantes em geral conseguirem fazer avaliações e atividades de forma online, fácil e dinâmica."
                :author="['name' => 'Pedro Henrique Godoy Costa']"
                date="[ data ]"
                reading-time="[ n ] min de leitura"
                :meta="[
                    ['label' => 'Repositório', 'value' => 'github.com/PHGodoyCosta/discipline-web', 'href' => 'https://github.com/PHGodoyCosta/discipline-web'],
                    ['label' => 'Tecnologias', 'chips' => ['TypeScript', 'React', 'ElectronJS', 'NestJS', 'Bootstrap']],
                    ['label' => 'Status', 'value' => '[ em andamento ]', 'badge' => 'sand'],
                ]"
            >
                <x-slot:kicker>
                    <x-phgodoycosta.badge variant="ice" dot>Open source</x-phgodoycosta.badge>
                    <x-phgodoycosta.badge>Estudo de caso</x-phgodoycosta.badge>
                </x-slot:kicker>
            </x-articles.header>

            <div style="padding-bottom: var(--space-8);"></div>
        </div>
    </section>

    {{-- Rodapé --}}
    <section style="margin-bottom: var(--space-8);">
        <h2 class="vg-t-heading-md">Footer</h2>
        <p class="vg-t-body-sm" style="color: var(--ink-muted); margin-top: var(--space-1);">Peixe, versículo, navegação, links e linha de direitos.</p>

        <div style="margin-top: var(--space-5); background: var(--surface); border: 1px solid var(--line); border-radius: var(--radius-lg); overflow: hidden;">
            <x-layout.vg-footer
                verse="[ versículo ou frase ]"
                year="2026"
                :social="[
                    ['label' => 'GitHub', 'href' => 'https://github.com/PHGodoyCosta'],
                    ['label' => 'LinkedIn', 'href' => '[ /usuário ]'],
                    ['label' => 'Instagram', 'href' => '[ @usuário ]'],
                ]"
            />
        </div>
    </section>

</main>
@endsection
