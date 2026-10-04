@extends('layouts.app')

@section('title', $project->name . ' - Projeto')

@section('meta')
        <meta property="og:site_name" content="Site Portfólio - Pedro Henrique Godoy Costa">
        <meta property="og:title" content="{{ $project->name }} - Projeto" />
        <meta property="og:description" content="{{ $project->description }}" />
        <meta property="og:image" itemprop="image" content="https://phgodoycosta.com.br/images/posts/{{ $project->slug }}/wpp.png">
        <meta property="og:type" content="website" />
@endsection

@section('styles')
        <style>
            .project-post *{
                margin: auto;
                max-width: 100% !important;
            }

            .project-post a {
                word-break: break-all;
            }

            .project-post img, .project-post video {
                max-width: 100%;
            }

            .project img {
                max-width: 300px;
                min-width: 200px;
                /*height: 150px;*/
                border-radius: 10px;
            }

            .project-post .obs {
                padding: 10px;
                background-color: #cccccc;
                color: #1a1a1a;
                border-radius: 5px;
                margin-top: 10px;
                margin-bottom: 10px;

            }

            .project-post h2, .project-post p {
                margin-top: 5px;
                margin-bottom: 10px;
            }

            .project-post h1, .project-post h2, .project-post h3, .project-post h4, .project-post h5, .project-post h6 {
                font-weight: bold;
                margin-top: 5px;
                margin-bottom: 10px;
            }

            @media only screen and (max-width: 500px) {
                .project-post p {
                    text-align: justify;
                }
            }
        </style>
@endsection

@section('content')
        <h1 class="text-center fw-bold text-capitalize">{{ $project->name }}</h1>
        <div class="container w-100 mb-5">
            @if ($project->repository)
                <!--<p class="mb-3 fs-6 fs-md-5">
                    <span class="fw-bold">Data de publicação:</span>
                    <span>20/12/2006</span>
                </p>-->
                <p class="fs-6 fs-md-5" style="word-break: break-all;">
                    <span class="fw-bold">Link do repositório:</span>
                    <a href="{{ $project->repository }}" class="link-light">{{ $project->repository }}</a>
                </p>
            @endif
            <div class="d-flex pt-3 pb-3 flex-wrap" style="gap: 5px">
                @foreach ($project->tags as $tag)
                    @php
                        if (count($tag->projects) > 0) {
                            $linkTag = "#";
                        } else {
                            $linkTag = '/tag/' . $tag->slug;
                        }
                    @endphp
                    <a href="@php echo $linkTag; @endphp" target="_blank">
                        <div class="tag" style="@php echo 'background-color: ' . $tag->backgroundColor . ';border-color: ' . $tag->borderColor . ';color: ' . $tag->color . ';'  @endphp">
                            <span>{{ $tag->name }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="project-post pb-2">
                @php
                    echo $markdown;
                @endphp
            </div>
        </div>
@endsection
