@props([
    'cite' => null,
])

<figure class="vg-pullquote vg-t-article-quote">
    <x-icon name="quote" :size="24" class="vg-pullquote__mark" />
    <blockquote><p>{{ $slot }}</p></blockquote>
    @if ($cite)
        <figcaption><cite class="vg-t-caption">{{ $cite }}</cite></figcaption>
    @endif
</figure>
