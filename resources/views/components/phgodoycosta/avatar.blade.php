@props([
    'src' => '/images/perfil-tree.jpg',
    'name' => '',
    'size' => 'md',
])

@php
    $parts = array_values(array_filter(explode(' ', trim($name))));
    $initials = ($parts[0][0] ?? '') . (count($parts) > 1 ? $parts[count($parts) - 1][0] : '');

    $classes = trim(implode(' ', array_filter([
        'vg-avatar',
        'vg-t-mono-sm',
        $size !== 'md' ? 'vg-avatar--' . $size : null,
    ])));
@endphp

<span {{ $attributes->class($classes) }} role="img" aria-label="{{ $name }}">
    @if ($src)
        <img src="{{ $src }}" alt="">
    @else
        {{ Str::upper($initials) }}
    @endif
</span>
