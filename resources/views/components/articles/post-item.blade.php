@props([
    'title',
    'href' => '#',
    'dek' => null,
    'author' => null,
    'date' => '[ data ]',
    'readingTime' => '[ n ] min de leitura',
    'tags' => [],
    'thumb' => null,
    'thumbLabel' => 'capa',
])

<article {{ $attributes->class(['vg-post']) }}>
    <div class="vg-post__main">
        @if ($author)
            <div class="vg-post__author">
                <x-phgodoycosta.avatar :name="$author" size="sm" />
                <span class="vg-t-body-sm">{{ $author }}</span>
            </div>
        @endif

        <h3 class="vg-post__title" style="font-size: var(--article-h3-size); line-height: var(--article-h3-lh); letter-spacing: var(--article-h3-tracking); font-weight: 600;">
            <a href="{{ $href }}">{{ $title }}</a>
        </h3>

        @if ($dek)
            <p class="vg-post__dek vg-t-body">{{ $dek }}</p>
        @endif

        <div class="vg-post__foot vg-t-caption">
            <span class="vg-post__meta">{{ $date }} &middot; {{ $readingTime }}</span>
            @if (count($tags))
                <x-phgodoycosta.badge>{{ $tags[0] }}</x-phgodoycosta.badge>
            @endif
        </div>
    </div>

    <div class="vg-post__thumb">
        @if ($thumb)
            <img src="{{ $thumb }}" alt="">
        @else
            <x-phgodoycosta.slot :label="$thumbLabel" />
        @endif
    </div>
</article>
