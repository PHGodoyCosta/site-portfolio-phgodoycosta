@props([
    'verse' => null,
    'links' => null,
    'social' => null,
    'year' => null,
    'name' => 'Pedro Henrique Godoy Costa',
    'location' => 'Campo Grande, MS',
])

@php
    $navLinks = $links ?? [
        ['label' => 'Início', 'href' => '/'],
        ['label' => 'Sobre', 'href' => '/#sobre-mim'],
        ['label' => 'Projetos', 'href' => '/#portfolio'],
        ['label' => 'Blog', 'href' => '/blog'],
        ['label' => 'Contato', 'href' => '/#contato'],
    ];

    $socialLinks = $social ?? [
        ['label' => 'GitHub', 'href' => 'https://github.com/PHGodoyCosta'],
        ['label' => 'LinkedIn', 'href' => 'https://www.linkedin.com/in/phgodoycosta/'],
        ['label' => 'Instagram', 'href' => 'https://www.instagram.com/phgodoycosta/'],
    ];

    $footerYear = $year ?? date('Y');
@endphp

<footer {{ $attributes->class(['vg-footer']) }}>
    <div class="vg-footer__inner">
        <div class="vg-footer__top">
            <div class="vg-footer__brand">
                <x-phgodoycosta.ichthys :size="48" :title="$name" />
                @if ($verse)
                    <p class="vg-footer__verse vg-t-article-dek">{{ $verse }}</p>
                @endif
            </div>

            <nav class="vg-footer__col" aria-label="Rodapé">
                <h3 class="vg-t-label">Navegação</h3>
                <ul>
                    @foreach ($navLinks as $link)
                        <li><a class="vg-t-body-sm" href="{{ $link['href'] }}">{{ $link['label'] }}</a></li>
                    @endforeach
                </ul>
            </nav>

            <div class="vg-footer__col">
                <h3 class="vg-t-label">Links</h3>
                <ul>
                    @foreach ($socialLinks as $link)
                        <li>
                            <a class="vg-t-body-sm" href="{{ $link['href'] }}" target="_blank" rel="noopener noreferrer">
                                {{ $link['label'] }}
                                <span class="vg-sr-only"> (abre em nova aba)</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="vg-footer__bottom vg-t-caption">
            <span>&copy; {{ $footerYear }} {{ $name }}</span>
            <span>{{ $location }}</span>
        </div>
    </div>
</footer>
