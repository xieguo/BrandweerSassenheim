@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <nav class="d-none d-md-block" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.articles.index') }}">Artikelen</a></li>
                    </ol>
                </nav>

                <a href="{{ $article->path }}" class="float-right btn btn-outline-secondary">
                    Bekijken
                </a>

                <h2 class="border-bottom pb-2">
                    Artikel wijzigen
                </h2>

                <form method="POST" action="{{ route('admin.articles.update', $article->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    @include('admin.articles.form')
                </form>

                <hr>

                @component('components.file_browser', ['type' => 'article', 'entity' => $article, 'errors' => $errors])
                @endcomponent
            </div><!-- /.blog-main -->

            @include('components.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection()
