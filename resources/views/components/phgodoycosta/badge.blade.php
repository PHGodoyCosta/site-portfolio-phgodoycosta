@props([
    'variant' => 'neutral',
    'dot' => false,
    'href' => null,
])

@php
    $tag = $href ? 'a' : 'span';

    $classes = trim(implode(' ', array_filter([
        'vg-badge',
        'vg-t-mono-sm',
        $variant !== 'neutral' ? 'vg-badge--' . $variant : null,
    ])));
@endphp

<{{ $tag }} {{ $attributes->except(['variant', 'dot', 'href'])->merge(['class' => $classes, 'href' => $href])->filter(fn ($value) => $value !== null) }}>
    @if ($dot)
        <span class="vg-badge__dot" aria-hidden="true"></span>
    @endif
    {{ $slot }}
</{{ $tag }}>
