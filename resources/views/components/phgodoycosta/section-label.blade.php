@props([
    'index' => null,
])

<div {{ $attributes->class(['vg-section-label']) }}>
    @if ($index !== null)
        <span class="vg-section-label__index vg-t-label" aria-hidden="true">{{ $index }}</span>
    @endif
    <span class="vg-t-ui">{{ $slot }}</span>
    @isset($symbol)
        <span class="vg-section-label__symbol">{{ $symbol }}</span>
    @endisset
</div>
