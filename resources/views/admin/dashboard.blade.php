@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="feature-list feature-list-sm row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <span class="h6">Uitrukken</span>
                        </div>
                        <a href="{{ route('admin.reports.index') }}">Alle uitrukken ›</a>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-spacing-sm">
                            @foreach ($reports as $report)
                                <li>
                                    <i class="icon-text-document text-muted mr-1"></i>
                                    <a href="{{ route('admin.reports.show', $report->id) }}">
                                        @if (!$report->is_visible)
                                            <span class="badge badge-light">Verborgen</span>
                                        @endif
                                        {{ $report->title }}
                                    </a>
                                </li>
                            @endforeach()
                        </ul>
                    </div>
                </div>
                <!--end of card-->
            </div>
            <!--end of col-->

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <span class="h6">Artikelen</span>
                        </div>
                        <a href="#">Alle artikelen ›</a>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-spacing-sm">
                            @foreach ($articles as $article)
                                <li>
                                    <i class="icon-text-document text-muted mr-1"></i>
                                    <a href="{{ route('admin.articles.show', $article->id) }}">
                                        {{ $article->title }}
                                    </a>
                                </li>
                            @endforeach()
                        </ul>
                    </div>
                </div>
                <!--end of card-->
            </div>
            <!--end of col-->
        </div>
    </div>
@endsection

@section('scripts')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script>
        var data = {
            // A labels array that can contain any sort of values
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
            // Our series array that contains series objects or in this case series data arrays
            series: [
                [5, 2, 4, 2, 0]
            ]
        };

        // Create a new line chart object where as first parameter we pass in a selector
        // that is resolving to our chart container element. The Second parameter
        // is the actual data object.
        new Chartist.Line('.ct-chart', data);
    </script>

@endsection
