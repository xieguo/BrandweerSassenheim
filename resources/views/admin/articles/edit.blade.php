@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('articles.type', [strtolower($article->type)]) }}">{{ ucfirst($article->type) }}</a></li>
                    </ol>
                </nav>

                <h2 class="border-bottom pb-2">
                    Artikl wijzigen
                </h2>

                <form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    @include('articles.form')
                </form>

                <hr>

                @component('components.file_browser', ['type' => 'article', 'entity' => $article, 'errors' => $errors])
                @endcomponent
            </div><!-- /.blog-main -->

            @include('components.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection()
