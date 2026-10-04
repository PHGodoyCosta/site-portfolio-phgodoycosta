@props([
    'label',
    'ratio' => null,
    'fill' => false,
])

<div
    {{ $attributes->class(['vg-slot']) }}
    @if ($fill)
        style="width: 100%; height: 100%;"
    @elseif ($ratio)
        style="aspect-ratio: {{ $ratio }};"
    @endif
    role="img"
    aria-label="Espaço reservado: {{ $label }}"
>
    <span class="vg-t-caption">[ {{ $label }} ]</span>
</div>
