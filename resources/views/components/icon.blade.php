@props([
    'name',
    'size' => 16,
    'title' => null,
])

{!! svg('lucide-' . $name, trim('vg-icon ' . ($attributes->get('class') ?? '')), array_filter([
    'width' => $size,
    'height' => $size,
    'title' => $title,
    'aria-hidden' => $title ? null : 'true',
    'role' => $title ? 'img' : null,
]) + $attributes->except(['name', 'size', 'title', 'class'])->getAttributes())->toHtml() !!}
