@props([
    'src' => null,
    'poster' => null,
    'label' => 'vídeo',
])

<figure class="vg-figure">
    <div class="vg-figure__media">
        <video src="{{ $src }}" @if ($poster) poster="{{ $poster }}" @endif controls preload="metadata" playsinline aria-label="{{ $label }}">
            Seu navegador não suporta o elemento de vídeo.
        </video>
    </div>
</figure>
