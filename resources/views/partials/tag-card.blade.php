@php
    if ($tag->isTaggable == 1) {
        $linkTag = "/tag/" . $tag->slug;
    } else {
        $linkTag = "#";
    }
@endphp

<a href="{{ $linkTag }}" class="skill" target="_blank">
    <img src="images/@php echo $tag->slug . '_icon.png'; @endphp" alt="Imagem icon da tecnologia {{ $tag->name }}">
    @if ($tag->isEstudando == 1)
        <div class="d-flex p-3 m-0 flex-column">
            <span>{{ $tag->name }}</span>
            <div style="color: #f54d3a">
                <span>(Estudando)</span>
            </div>
        </div>
    @else
        <span>{{ $tag->name }}</span>
    @endif
</a>
