@extends('layouts.app')

@section('title', 'Todos os meus projetos')

@section('content')
        <h1 class="text-center fw-bold text-capitalize mb-2">Todos os meus projetos mais relevantes</h1>
        <div class="w-100 mt-4 section" style="background-color: var(--section-light-background);min-height: 200px;color: white">
            <div class="d-flex p-3 justify-content-center flex-wrap" style="gap: 20px">
                @foreach($projects as $project)
                    @include('components.shared.project-card', ["project" => $project])
                @endforeach
            </div>
        </div>
@endsection
