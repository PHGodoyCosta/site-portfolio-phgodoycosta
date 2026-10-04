<li class="fs-5">
    @php
        if ($formation->link) {
            $f_link = $formation->link;
        } else {
            $f_link = "#";
        }
    @endphp
    <a class="link-light fw-bold" style="text-decoration: underline" href="@php echo $f_link; @endphp">
        <span>{{ $formation->name }}</span>
        @if ($formation->year)
            <span>({{ $formation->year }})</span>
        @endif
    </a>
    <p class="fs-6 mt-1 description_curso" id="description_complete_{{ $i }}" style="display: none;">
        <span>{{ $formation->description }}</span>
        <a class="fw-bold text-white text-decoration-underline" href="javascript:void(0)" onclick="hide_formation_description_text({{ $i }})">Ler menos</a>
    </p>
    <p class="fs-6 mt-1 description_curso" id="description_resumed_{{ $i }}" style="display: block;">
        <span>{{ Str::limit($formation->description, 120) }}</span>
        <a class="fw-bold text-white text-decoration-underline" href="javascript:void(0)" onclick="show_formation_description_text({{ $i }})">Ler mais</a>
    </p>
</li>
