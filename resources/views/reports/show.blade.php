@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <nav class="d-none d-md-block" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('reports.index') }}">Uitrukken</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('reports.year', $report->report_at->format('Y')) }}">{{ $report->report_at->format('Y') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $report->title }}</li>
                    </ol>
                </nav>

                @auth
                    <a href="{{ route('admin.reports.show', $report->id) }}" class="float-right btn btn-outline-success">
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
                    <div id="lightgallery">
                        @foreach ($report->files as $file)
                            <a href="{{ $file->path }}">
                                <img src="{{ $file->path }}" width="200" class="mr-2">
                            </a>
                        @endforeach
                    </div>
                @endif

                <div class="spacer my-5"></div>

                <h5 class="mb-3">
                    Meer recente uitrukken
                </h5>

                @if ($related_reports)
                    @foreach ($related_reports as $related_report)
                        @component('components.report', ['report' => $related_report])
                        @endcomponent
                    @endforeach
                @endif
            </div><!-- /.blog-main -->

            @include('components.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection()
