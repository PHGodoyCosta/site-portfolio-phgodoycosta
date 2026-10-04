@props([
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'iconRight' => null,
    'iconOnly' => false,
    'href' => null,
    'target' => null,
    'rel' => null,
    'download' => null,
])

@php
    $tag = $href ? 'a' : 'button';
    $iconSize = $size === 'sm' ? 14 : 16;

    $classes = trim(implode(' ', array_filter([
        'vg-btn',
        'vg-btn--' . $variant,
        'vg-btn--' . $size,
        $iconOnly ? 'vg-btn--icon' : null,
        $variant === 'link' ? 'vg-t-ui' : ($size === 'sm' ? 'vg-t-ui-sm' : 'vg-t-ui'),
    ])));
@endphp

<{{ $tag }}
    {{ $attributes->except(['variant', 'size', 'icon', 'iconRight', 'iconOnly', 'href', 'target', 'rel', 'download'])->merge([
        'class' => $classes,
        'href' => $href,
        'target' => $target,
        'rel' => $rel,
        'download' => $download,
        'type' => $tag === 'button' ? ($attributes->get('type') ?? 'button') : null,
    ])->filter(fn ($value) => $value !== null) }}
>
    @if ($icon)
        <x-icon :name="$icon" :size="$iconSize" />
    @endif

    @if ($slot->isNotEmpty())
        <span>{{ $slot }}</span>
    @endif

    @if ($iconRight)
        <x-icon :name="$iconRight" :size="$iconSize" :class="$iconRight === 'arrow-up-right' ? 'vg-icon--arrow' : ''" />
    @endif
</{{ $tag }}>
