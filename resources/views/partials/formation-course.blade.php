<li class="fs-5">
    @php
        if ($formation->link) {
            $f_link = $formation->link;
        } else {
            $f_link = "#";
        }
    @endphp
    <a class="link-light fw-bold" href="@php echo $f_link; @endphp">
        <span>{{ $formation->name }}</span>
        @if ($formation->year)
            <span>({{ $formation->year }})</span>
        @endif
    </a>
    <p class="ms-3 fs-6 description_curso">{{ $formation->description }}</p>
</li>
