@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Artikelen</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
                    </ol>
                </nav>

                <h3 class="pb-3 mb-4 border-bottom">
                    {{ $article->title }}
                </h3>

                <p>{{ $article->description }}</p>
            </div><!-- /.blog-main -->

            @include('components.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection()
