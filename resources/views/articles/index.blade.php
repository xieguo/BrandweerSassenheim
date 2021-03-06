@extends('layouts.app')

@section('content')
    @if ($articles)
        <div class="border-bottom">
            <div class="container">
                <ul class="row list-unstyled">
                    @foreach ($articles as $key => $article)
                        <li class="col-12 col-md-6 col-lg-4 mb-4">
                            <a href="{{ $article->path }}" class="card card-lg card-link box-shadow">
                                <span class="position-relative h-150">
                                    <img class="bg-image" src="{{ url_cdn($article->image) }}" alt="{{ $article->title }}">
                                </span>
                                <span class="card-body">
                                    <h4 class="card-title mb-3 text-dark">{{ $article->title }}</h4>
                                    <p class="card-text text-muted">{{ str_limit($article->introduction, 120) }}</p>
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($articles as $key => $article)
                        @if ($key % 5 < 2)
                            <div class="col-md-6">
                                <a href="{{ $article->path }}" class="card card-link flex-md-row mb-4 box-shadow overflow-hidden h-md-200 bg-center bg-cover d-flex align-items-end" style="background-image: url({{ url_cdn($article->image) }})">
                                    <span class="d-block card-body text-light bg-dark-75 w-100 py-3">
                                        <h5 class="mb-1">{{ $article->title }}</h5>
                                        <p class="card-text">{{ str_limit($article->introduction, 120) }}</p>
                                    </span>
                                </a>
                            </div>
                        @else
                            <div class="col-md-4">
                                <div class="card flex-md-row mb-4 box-shadow overflow-hidden h-200">
                                    <a href="{{ $article->path }}" class="card-link card-body d-flex flex-column align-items-start text-dark">
                                        <h5 class="mb-2">{{ $article->title }}</h5>
                                        <p class="card-text text-muted">{{ str_limit($article->introduction, 120) }}</p>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="d-flex justify-content-center">
                    {{ $articles->links('components.pagination') }}
                </div>
            </div>
        </div>
    @endif
@endsection()
