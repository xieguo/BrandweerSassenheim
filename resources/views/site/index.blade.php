@extends('layouts.app')

@section('content')
    @if ($featured)
        <div class="border-bottom">
            <div class="container">
                <div class="row">
                    @foreach ($featured as $feature)
                        <div class="col-md-6">
                            <a href="{{ $feature->path }}" class="card card-link flex-md-row mb-4 box-shadow overflow-hidden h-md-200 bg-center bg-cover d-flex align-items-end" style="background-image: url_cdn({{ url_cdn($feature->image) }})">
                                <span class="d-block card-body text-light bg-dark-75 w-100 py-3">
                                    <h5 class="mb-1">{{ $feature->title }}</h5>
                                    <p class="card-text">{{ str_limit($feature->introduction, 120) }}</p>
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
            <div class="col-md-6 blog-main">
                <div class="card box-shadow">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <span class="h6">Nieuws</span>
                        </div>
                        <a href="nieuws">Meer nieuws ›</a>
                    </div>
                    @foreach ($articles as $article)
                        <a href="{{ $article->path }}" class="card-link card-body text-dark">
                            <h5 class="mb-2">{{ $article->title }}</h5>
                            <div class="mb-1 text-muted" style="font-size: 80%">
                                {{ t($article->created_at->format('l j F Y')) }}
                                @if ($article->source)
                                    - 112Bollenstreek.nl
                                @endif
                            </div>
                            <p class="card-text">{{ str_limit($article->description, 120) }}</p>
                        </a>
                        @if ($article->image)
                            <div class="d-none d-lg-block bg-dark bg-center bg-cover" style="min-width: 200px; background-image: url_cdn({{ $article->image }});"></div>
                        @endif
                        <hr>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6 blog-main">
                <div class="card box-shadow">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <span class="h6">Uitrukken</span>
                        </div>
                        <a href="{{ route('reports.index') }}">Alle uitrukken ›</a>
                    </div>

                    @foreach ($reports as $report)
                        <a href="{{ $report->path }}" class="card-link card-body text-dark">
                            <h5 class="mb-2">{{ $report->title }}</h5>
                            <small class="mb-1 text-muted">{{ t($report->created_at->format('l j F Y')) }}</small>
                            <p class="card-text">{{ str_limit($report->description, 120) }}</p>
                        </a>
                        @if ($report->files->count())
                            <div class="d-none d-lg-block bg-dark bg-center bg-cover" style="min-width: 200px; background-image: url({{ $report->files[0]->path }});"></div>
                        @endif
                        <hr>
                    @endforeach
                </div>
            </div>

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection()
