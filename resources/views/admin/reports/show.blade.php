@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.reports.index') }}">Uitrukken</a></li>
                <li class="breadcrumb-item active">{{ $report->title }}</li>
            </ol>
        </nav>

        <a href="{{ $report->path }}" class="float-right btn btn-outline-secondary">
            Bekijken
        </a>

        <h2 class="border-bottom pb-2">
            Uitruk wijzigen
        </h2>

        <div class="row">
            <div class="col-md-6 blog-main">
                <form method="POST" action="{{ route('admin.reports.update', $report->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    @include('admin.reports.form')
                </form>
            </div><!-- /.blog-main -->

            <div class="col-md-6">
                @component('components.file_browser', ['type' => 'report', 'entity' => $report, 'errors' => $errors])
                @endcomponent
            </div>

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection()
