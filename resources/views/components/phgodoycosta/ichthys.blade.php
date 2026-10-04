@props([
    'size' => 40,
    'strokeWidth' => 1.5,
    'title' => null,
])

<svg
    {{ $attributes->except(['size', 'strokeWidth', 'title'])->class(['vg-ichthys']) }}
    viewBox="0 0 64 32"
    width="{{ $size }}"
    height="{{ $size / 2 }}"
    fill="none"
    stroke="currentColor"
    stroke-width="{{ $strokeWidth }}"
    stroke-linecap="round"
    stroke-linejoin="round"
    focusable="false"
    @if ($title)
        role="img"
        aria-label="{{ $title }}"
    @else
        aria-hidden="true"
    @endif
>
    <path vector-effect="non-scaling-stroke" d="M2 16C14 2.1 36 2.1 50 16L62 28" />
    <path vector-effect="non-scaling-stroke" d="M2 16C14 29.9 36 29.9 50 16L62 4" />
</svg>
