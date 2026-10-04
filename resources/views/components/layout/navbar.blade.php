@props([
    'links' => null,
    'current' => null,
    'brandHref' => '/',
    'brandLabel' => 'Pedro Henrique Godoy Costa, início',
    'scrolled' => null,
    'forceMobile' => false,
    'defaultOpen' => false,
])

@php
    $navLinks = $links ?? [
        ['label' => 'Início', 'href' => '/'],
        ['label' => 'Sobre', 'href' => '/#sobre-mim'],
        ['label' => 'Projetos', 'href' => '/#portfolio'],
        ['label' => 'Blog', 'href' => '/blog'],
        ['label' => 'Contato', 'href' => '/#contato'],
    ];

    $autoScroll = $scrolled === null;
@endphp

<header
    {{ $attributes->class(array_filter([
        'vg-nav',
        $forceMobile ? 'vg-nav--mobile' : null,
    ])) }}
    x-data="{
        open: {{ $defaultOpen ? 'true' : 'false' }},
        scrolled: {{ $autoScroll ? 'false' : ($scrolled ? 'true' : 'false') }},
        init() {
            @if ($autoScroll)
                this.scrolled = window.scrollY > 8;
                window.addEventListener('scroll', () => { this.scrolled = window.scrollY > 8; }, { passive: true });
            @endif
        },
    }"
    :class="{ 'vg-nav--scrolled': scrolled }"
    @keydown.escape.window="open = false"
>
    <div class="vg-nav__inner">
        <a class="vg-nav__brand" href="{{ $brandHref }}" aria-label="{{ $brandLabel }}">
            <x-phgodoycosta.ichthys :size="44" />
        </a>

        <nav aria-label="Principal" style="display: contents;">
            <ul class="vg-nav__links">
                @foreach ($navLinks as $link)
                    <li>
                        <a
                            class="vg-nav__link vg-t-ui"
                            href="{{ $link['href'] }}"
                            @if ($current === $link['label']) aria-current="page" @endif
                        >{{ $link['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        @isset($actions)
            <div class="vg-nav__actions">
                {{ $actions }}
            </div>
        @endisset

        <button
            type="button"
            class="vg-btn vg-btn--ghost vg-btn--icon vg-nav__toggle"
            @click="open = !open"
            :aria-expanded="open.toString()"
            aria-controls="vg-nav-sheet"
            :aria-label="open ? 'Fechar menu' : 'Abrir menu'"
        >
            <x-icon name="menu" :size="16" x-show="!open" />
            <x-icon name="x" :size="16" x-show="open" x-cloak />
        </button>
    </div>

    <div id="vg-nav-sheet" class="vg-nav__sheet" :data-open="open ? 'true' : 'false'" :inert="!open">
        <ul>
            @foreach ($navLinks as $link)
                <li>
                    <a
                        class="vg-t-heading-sm"
                        href="{{ $link['href'] }}"
                        @if ($current === $link['label']) aria-current="page" @endif
                        @click="open = false"
                    >
                        {{ $link['label'] }}
                        <x-icon name="arrow-right" :size="18" />
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</header>
