@extends('layouts.app')

@section('title', 'Projetos com ' . $tag->name)

@section('content')
        <h1 class="text-center fw-bold text-capitalize mb-2">Projetos com {{ $tag->name }}</h1>
        <div class="w-100 mt-4 section" style="background-color: var(--section-light-background);min-height: 200px;color: white">
            <h2 class="ms-3 fs-3">Mais Relevantes</h2>
            <div class="d-flex p-3 justify-content-center flex-wrap" style="gap: 20px">
                @foreach($tag->projects as $project)
                    @include('components.shared.project-card', ["project" => $project])
                @endforeach
            </div>
        </div>
@endsection
