@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.articles.index') }}">Artikelen</a></li>
                <li class="breadcrumb-item active">Toevoegen</li>
            </ol>
        </nav>

        <h2 class="border-bottom pb-2">
            Artikel toevoegen
        </h2>

        <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            @include('admin.articles.form')
        </form>

    </main><!-- /.container -->
@endsection()
