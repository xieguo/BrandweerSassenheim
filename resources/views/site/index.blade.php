@extends('layouts.app')

@section('content')
    @if ($articles)
        <div class="border-bottom">
            <div class="container">
                <div class="row">
                    @foreach ($articles as $article)
                        <div class="col-md-6">
                            <a href="{{ $article->path }}" class="card card-link flex-md-row mb-4 box-shadow overflow-hidden h-md-200 bg-center bg-cover d-flex align-items-end" style="background-image: url({{ url_cdn($article->image) }})">
                                <span class="d-block card-body text-light bg-dark-75 w-100 py-3">
                                    <h5 class="mb-1">{{ $article->title }}</h5>
                                    <p class="card-text">{{ str_limit($article->introduction, 120) }}</p>
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <main role="main" class="container mt-4">
        <div class="row">
            <div class="col-md-8 blog-main">
                <!--<h3 class="pb-3 mb-4 border-bottom">
                    Recent nieuws
                </h3>-->

                @foreach ($reports as $report)
                    <div class="card flex-md-row mb-4 box-shadow">
                        <a href="{{ $report->path }}" class="card-link card-body d-flex flex-column align-items-start text-dark">
                            <h5 class="mb-2">{{ $report->title }}</h5>
                            <small class="mb-1 text-muted">{{ t($report->created_at->format('l j F Y')) }}</small>
                            <p class="card-text">{{ str_limit($report->description, 120) }}</p>
                            <span class="text-primary">Lees verder</span>
                        </a>
                        <div class="d-none d-lg-block bg-dark bg-center bg-cover" style="min-width: 200px; background-image: url(https://placehold.it/200x200);"></div>
                    </div>
                @endforeach
            </div><!-- /.blog-main -->

            @include('components.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection()
