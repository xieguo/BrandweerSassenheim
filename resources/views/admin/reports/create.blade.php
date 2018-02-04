@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.reports.index') }}">Uitrukken</a></li>
                <li class="breadcrumb-item active">Toevoegen</li>
            </ol>
        </nav>

        <h2 class="border-bottom pb-2">
            Uitruk toevoegen
        </h2>

        <form method="POST" action="{{ route('admin.reports.store') }}">
            {{ csrf_field() }}

            @include('admin.reports.form')
        </form>

    </main><!-- /.container -->
@endsection()
