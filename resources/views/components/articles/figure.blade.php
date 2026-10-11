@props([
    'src' => null,
    'alt' => '',
    'caption' => null,
    'label' => 'imagem',
    'ratio' => '16 / 9',
])

<figure class="vg-figure">
    <div @class(['vg-figure__media', 'vg-figure__media--slot' => ! $src])>
        @if ($src)
            <img src="{{ $src }}" alt="{{ $alt }}" loading="lazy">
        @else
            <x-phgodoycosta.slot :label="$label" :ratio="$ratio" />
        @endif
    </div>
    @if ($caption)
        <figcaption>{{ $caption }}</figcaption>
    @endif
</figure>
