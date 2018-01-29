@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('report.index') }}">Uitrukken</a></li>
                        <li class="breadcrumb-item active">{{ $year }}</li>
                    </ol>
                </nav>

                <div class="float-right">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <ul class="nav nav-pills">
                            @foreach ($years as $key => $value)
                                @if ($key < 2)
                                    <li class="nav-item">
                                        <a class="nav-link{{ $year == $value ? ' active' : '' }}" href="/uitrukken/{{ $value }}">
                                            {{ $value }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach

                            @if ($years->count() > 2)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        Archief
                                    </a>
                                    <div class="dropdown-menu">
                                        @foreach ($years as $key => $value)
                                            @if ($key >= 2)
                                                <a class="dropdown-item{{ $year == $value ? ' active' : '' }}" href="/uitrukken/{{ $value }}">
                                                    {{ $value }}
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                        </ul>

                        <a href="{{ route('report.create') }}" class="btn btn-outline-success float-right">Toevoegen</a>
                    </div>
                </div>

                <h2 class="border-bottom pb-2">
                    Uitrukken van {{ $year }}
                </h2>

                <table class="table">
                    <thead>
                    <tr>
                        <th class="border-top-0" scope="col">#</th>
                        <th class="border-top-0" scope="col">Datum</th>
                        <th class="border-top-0" scope="col">Melding</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <th scope="row">{{ $report->id }}</th>
                            <td>{{ $report->report_at->format('d M') }}</td>
                            <td><a href="{{ $report->path }}">{{ $report->title }}</a></td>
                        </tr>
                    @endforeach()
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $reports->links('components.pagination') }}
                </div>
            </div><!-- /.blog-main -->

            @include('components.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection()