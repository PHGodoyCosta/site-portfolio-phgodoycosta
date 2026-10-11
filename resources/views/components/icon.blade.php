@props([
    'name',
    'size' => 16,
    'title' => null,
])

{!! svg(str_starts_with($name, 'si-') ? $name : 'lucide-' . $name, trim('vg-icon ' . ($attributes->get('class') ?? '')), array_filter([
    'width' => $size,
    'height' => $size,
    'title' => $title,
    'aria-hidden' => $title ? null : 'true',
    'role' => $title ? 'img' : null,
]) + $attributes->except(['name', 'size', 'title', 'class'])->getAttributes())->toHtml() !!}
