@extends('layouts.app')

@section('content')
    <section class="bg-dark text-light h-250 position-relative -mt-4 mb-4">
        <img alt="{{ $article->title }}" src="{{ url_cdn($article->image) }}" class="bg-image opacity-60">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12 col-md-10 col-lg-7 mt-5">
                    <h1 class="display-4">{{ $article->title }}</h1>
                    <span class="lead d-none d-md-block">{{ str_limit($article->introduction, 120) }}</span>
                </div>
                <!--end of col-->
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <nav class="d-none d-md-block" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('articles.type', [strtolower($article->type)]) }}">{{ ucfirst($article->type) }}</a></li>
                    </ol>
                </nav>

                @auth
                    <a href="{{ route('admin.articles.show', $article->id) }}" class="float-right btn btn-outline-success">
                        Wijzigen
                    </a>
                @endauth
                <p>{!! $article->description !!}</p>
            </div><!-- /.blog-main -->

            @include('components.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection()
