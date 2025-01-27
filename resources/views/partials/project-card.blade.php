<div class="project">
    <div>
        <a href="@php echo '/projeto/' . $project->slug; @endphp" class="d-flex align-items-center flex-column">
            <img src="@php echo '/images/posts/' . $project->slug . '/poster.png' @endphp" alt="Poster do projeto">
            <h3 class="fw-bold mt-2 text-capitalize">{{ $project->name }}</h3>
            @if ($project->description)
                <p style="max-width: 200px" class="m-0 text-center">{{ $project->description }}</p>
            @endif

        </a>
    </div>
    <div class="d-flex flex-wrap justify-content-center p-1" style="gap: 5px;max-width: 320px">
        @foreach ($project->tags as $tag)
            @php
                if (count($tag->projects) > 0) {
                    $linkTag = '/tag/' . $tag->slug;
                } else {
                    $linkTag = "#";
                }
            @endphp
            <a href="@php echo $linkTag; @endphp" target="_blank">
                <div class="tag" style="@php echo 'background-color: ' . $tag->backgroundColor . ';border-color: ' . $tag->borderColor . ';color: ' . $tag->color . ';'  @endphp">
                    <span>{{ $tag->name }}</span>
                </div>
            </a>
        @endforeach
    </div>
</div>
{{-- <div class="project">
    <div>
        <img src="https://i.pinimg.com/enabled/564x/6d/7f/16/6d7f164634919b5be31d6bc24ef83a0f.jpg" alt="">
        <a href="#">
            <h3 class="fw-bold mt-2">TemdeBom</h3>
            <p style="max-width: 200px" class="m-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid nihil magni error perspiciatis porro expedita atque totam voluptas quo perferendis..</p>
        </a>
    </div>
    <div class="d-flex p-3" style="gap: 5px">
        <div class="tag" style="background-color: #00d8ff;border-color: #00c2e6;color: white">
            <span>React</span>
        </div>
    </div>
</div> --}}
