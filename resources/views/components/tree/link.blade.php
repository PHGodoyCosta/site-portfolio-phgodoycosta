@props([
    'label',
    'href',
    'meta' => null,
    'brand' => null,
    'icon' => null,
    'ichthys' => false,
    'wordmark' => null,
])

{{--
    Uma linha da lista de /tree. A marca vem de um logo do Simple Icons
    ($brand), de um ícone Lucide ($icon), do peixe ($ichthys) ou de um
    arquivo SVG em public/brand ($wordmark). Em um tom só, nunca na cor
    da rede.
--}}
<a
    {{ $attributes->class(['vg-tree-link']) }}
    href="{{ $href }}"
    target="_blank"
    rel="noopener noreferrer"
>
    <span @class(['vg-tree-link__mark', 'vg-tree-link__mark--wordmark' => (bool) $wordmark]) aria-hidden="true">
        @if ($brand)
            {!! svg('si-' . $brand)->toHtml() !!}
        @elseif ($wordmark)
            {!! file_get_contents(public_path('brand/' . $wordmark)) !!}
        @elseif ($ichthys)
            <x-phgodoycosta.ichthys :size="24" />
        @else
            <x-icon :name="$icon" :size="18" />
        @endif
    </span>

    <span class="vg-tree-link__text">
        <span class="vg-t-ui vg-tree-link__label">{{ $label }}</span>
        @if ($meta)
            <span class="vg-t-mono-sm vg-tree-link__meta">{{ $meta }}</span>
        @endif
    </span>

    <x-icon name="arrow-up-right" :size="16" class="vg-tree-link__arrow" />

    <span class="vg-sr-only">(abre em nova aba)</span>
</a>
