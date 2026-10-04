@props([
    'title',
    'dek' => null,
    'author' => null,
    'date' => '[ data ]',
    'readingTime' => '[ n ] min de leitura',
    'meta' => null,
    'actions' => true,
    'onCopyLink' => null,
    'onShare' => null,
])

<header {{ $attributes->class(['vg-article-header']) }}>
    @isset($kicker)
        <div class="vg-article-header__kicker">{{ $kicker }}</div>
    @endisset

    <h1 class="vg-article-header__title vg-t-display-md">{{ $title }}</h1>

    @if ($dek)
        <p class="vg-article-header__dek vg-t-article-dek">{{ $dek }}</p>
    @endif

    @if ($author)
        <div class="vg-byline">
            <x-phgodoycosta.avatar :name="$author['name']" :src="$author['avatar'] ?? null" />
            <div>
                <p class="vg-byline__name vg-t-ui">{{ $author['name'] }}</p>
                <p class="vg-byline__meta vg-t-caption">{{ implode(' · ', array_filter([$readingTime, $date])) }}</p>
            </div>
        </div>
    @endif

    @if ($meta)
        <x-articles.meta-list :items="$meta" />
    @endif

    @if ($actions !== false)
        <x-articles.actions :on-copy-link="$onCopyLink" :on-share="$onShare">
            {{ $actions === true ? '' : $actions }}
        </x-articles.actions>
    @endif
</header>
