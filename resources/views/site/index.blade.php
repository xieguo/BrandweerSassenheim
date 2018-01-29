@extends('layouts.app')

@section('content')
    <div class="border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow overflow-hidden">
                        <a href="#" class="card-link card-body d-flex flex-column align-items-start text-dark">
                            <h3 class="mb-2">Vlam in de pan!</h3>
                            <p class="card-text">Tips om een vlam in de pan veilig te blussen en te voorkomen.</p>
                            <span class="text-primary">Lees verder</span>
                        </a>
                        <div class="d-none d-lg-block bg-dark bg-center bg-cover" style="min-width: 200px; background-image: url(https://placehold.it/200x200);"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-170 overflow-hidden">
                        <a href="#" class="card-link card-body d-flex flex-column align-items-start text-dark">
                            <h3 class="mb-2">Vlam in de pan!</h3>
                            <p class="card-text">Tips om een vlam in de pan veilig te blussen en te voorkomen.</p>
                            <span class="text-primary">Lees verder</span>
                        </a>
                        <div class="d-none d-lg-block bg-dark bg-center bg-cover" style="min-width: 200px; background-image: url(https://placehold.it/200x200);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <small class="mb-1 text-muted" data-toggle="tooltip" title="{{ $report->created_at->format('d-m-Y H:i') }}">{{ $report->created_at->diffForHumans() }}</small>
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
