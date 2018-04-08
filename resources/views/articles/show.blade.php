@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <nav class="d-none d-md-block" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('articles.type', [strtolower($article->type)]) }}">{{ ucfirst($article->type) }}</a></li>
                    </ol>
                </nav>

                <div href="{{ $article->path }}" class="card card-lg box-shadow">
                    <div class="position-relative h-150">
                        <img class="bg-image" src="{{ url_cdn($article->image) }}" alt="{{ $article->title }}">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title mb-3 text-dark">{{ $article->title }}</h4>
                        <p class="card-text text-muted">{!! $article->description !!}</p>
                    </div>
                </div>
            </div>

            @include('components.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection()
