@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <nav class="d-none d-md-block" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.reports.index') }}">Uitrukken</a></li>
            </ol>
        </nav>

        <div class="float-right">
            <a href="{{ route('admin.reports.create') }}" class="btn btn-outline-success">Toevoegen</a>
        </div>

        <h2 class="border-bottom pb-2">
            Uitrukken
        </h2>

        <table class="table">
            <thead>
            <tr>
                <th class="border-top-0 d-none d-md-table-cell" scope="col">Datum</th>
                <th class="border-top-0" scope="col">Melding</th>
                <th class="border-top-0 d-none d-md-table-cell" scope="col">&nbsp;</th>
                <th class="border-top-0" scope="col">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td class="d-none d-md-table-cell text-muted">{{ $report->report_at->format('d M') }}</td>
                    <td>
                        <a href="{{ route('admin.reports.show', $report->id) }}">{{ $report->title }}</a>

                        @if (!$report->is_visible)
                            <span class="badge badge-light">Verborgen</span>
                        @endif
                    </td>
                    <td class="d-none d-md-table-cell p-0">
                        @if ($report->files->count())
                            <a href="{{ route('admin.reports.show', $report->id) }}">
                                <img src="{{ $report->files[0]->path }}" alt="{{ $report->title }}" height="48">
                            </a>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.reports.destroy', $report->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-outline-danger btn-sm">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach()
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $reports->links('components.pagination') }}
        </div>
    </main><!-- /.container -->
@endsection()
