@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('articles.type', [strtolower($article->type)]) }}">{{ ucfirst($article->type) }}</a></li>
                    </ol>
                </nav>

                @auth
                    <a href="{{ route('admin.articles.show', $article->id) }}" class="float-right btn btn-outline-success">
                        Wijzigen
                    </a>
                @endauth

                <h3 class="pb-3 mb-4 border-bottom">
                    {{ $article->title }}
                </h3>

                <div class="card flex-md-row mb-4 box-shadow overflow-hidden h-md-200 bg-center bg-cover d-flex align-items-end" style="background-image: url({{ url_cdn($article->image) }})">
                    <span class="d-block card-body text-light bg-dark-75 w-100 py-3">
                        <p class="card-text">{{ str_limit($article->introduction, 120) }}</p>
                    </span>
                </div>

                <p>{!! $article->description !!}</p>
            </div><!-- /.blog-main -->

            @include('components.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection()
