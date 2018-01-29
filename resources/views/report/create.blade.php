@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('report.index') }}">Uitrukken</a></li>
                        <li class="breadcrumb-item active">Toevoegen</li>
                    </ol>
                </nav>

                <h2 class="border-bottom pb-2">
                    Uitruk toevoegen
                </h2>

                <form method="POST" action="{{ route('report.store') }}">
                    {{ csrf_field() }}

                    @include('report.form')
                </form>
            </div><!-- /.blog-main -->

            @include('components.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection()
