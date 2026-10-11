@extends('layouts.app')

@section('content')
        @include('features.home.hero')
        @include('features.home.tecnologias')
        @include('features.home.sobre')
        @include('features.home.experience')

        @include('features.home.projetos-destaque')
        @include('features.home.contato')
@endsection

