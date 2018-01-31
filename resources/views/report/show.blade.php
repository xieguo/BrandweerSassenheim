@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <ul class="col-md-8 blog-main">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('report.index') }}">Uitrukken</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('report.year', $report->report_at->format('Y')) }}">{{ $report->report_at->format('Y') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $report->title }}</li>
                    </ol>
                </nav>

                @auth
                    <a href="{{ route('report.edit', $report->id) }}" class="float-right btn btn-outline-success">
                        Wijzigen
                    </a>
                @endauth

                <h3 class="pb-3 mb-4 border-bottom">
                    {{ $report->title }}
                </h3>

                @if ($report->description)
                    <div class="font-weight-bold">Nader bericht</div>
                    <p>{!! nl2br(strip_tags($report->description)) !!}</p>
                @endif

                <div class="row mb-4">
                    <div class="col-md-6">
                        <dl class="row mb-0 py-2">
                            <dt class="col-4">Nummer</dt>
                            <dd class="col-8 mb-0">{{ $report->id }}</dd>
                        </dl>

                        <dl class="row mb-0 py-2 bg-light">
                            <dt class="col-4">Datum</dt>
                            <dd class="col-8 mb-0">{{ t($report->report_at->format('l j F Y')) }}</dd>
                        </dl>

                        <dl class="row mb-0 py-2">
                            <dt class="col-4">Tijd</dt>
                            <dd class="col-8 mb-0">{{ $report->report_at->format('H:i') }}</dd>
                        </dl>

                        <dl class="row mb-0 py-2 bg-light">
                            <dt class="col-4">Melding</dt>
                            <dd class="col-8 mb-0">{{ $report->type }}</dd>
                        </dl>

                        <dl class="row mb-0 py-2">
                            <dt class="col-4">Adres</dt>
                            <dd class="col-8 mb-0">{{ $report->address }}</dd>
                        </dl>

                        <dl class="row mb-0 py-2 bg-light">
                            <dt class="col-4">Plaats</dt>
                            <dd class="col-8 mb-0">{{ $report->city }}</dd>
                        </dl>
                    </div>

                    <div class="col-md-6">
                        <img class="mw-100" width="413" height="240" src="http://maps.googleapis.com/maps/api/staticmap?center={{ $report->address_encoded }}&zoom=14&size=350x240&sensor=false&markers=size:mid%7Ccolor:red%7C{{ $report->address_encoded }}">
                    </div>
                </div>

                @if ($report->files())
                    <div class="overflow-y-scroll">
                        <ul class="list-inline" style="width: {{ $report->files->count() * 635 }}px;">
                            @foreach ($report->files as $file)
                                <li class="list-inline-item"><img src="http://cdn.brandweersassenheim.nl/large/{{ $file->file }}" width="600" style="margin-right: 20px;"></li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="spacer my-5"></div>

                <h4 class="pb-3 mb-4 border-bottom">
                    Meer recente uitrukken
                </h4>

                @if ($related_reports)
                    @foreach ($related_reports as $related_report)
                        <div class="card box-shadow mb-3">
                            <div class="card-body">
                                <h5 class="mb-0">
                                    <a class="text-dark" href="{{ $related_report->path }}">{{ $related_report->title }}</a>
                                </h5>
                                <div class="mb-1 text-muted d-inline-block" data-toggle="tooltip" title="{{ $related_report->created_at->format('d-m-Y H:i') }}">{{ $related_report->created_at->diffForHumans() }}</div>
                                <p class="card-text mb-2 d-none d-lg-block">{{ str_limit(strip_tags($related_report->description), 120) }}</p>
                                <a href="{{ $related_report->path }}">Lees meer</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div><!-- /.blog-main -->

            @include('components.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection()
