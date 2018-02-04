@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.articles.index') }}">Artikelen</a></li>
            </ol>
        </nav>

        <div class="float-right">
            <a href="{{ route('admin.articles.create') }}" class="btn btn-outline-success">Toevoegen</a>
        </div>

        <h2 class="border-bottom pb-2">
            Artikelen
        </h2>

        <table class="table">
            <thead>
            <tr>
                <th class="border-top-0 d-none d-md-table-cell">#</th>
                <th class="border-top-0 d-none d-md-table-cell" scope="col">Datum</th>
                <th class="border-top-0" scope="col">Artikel</th>
                <th class="border-top-0 d-none d-md-table-cell" scope="col">Categorie</th>
                <th class="border-top-0 d-none d-md-table-cell" scope="col">&nbsp&nbsp;</th>
                <th class="border-top-0" scope="col">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($articles as $article)
                <tr>
                    <th class="d-none d-md-table-cell">{{ $article->id }}</th>
                    <td class="d-none d-md-table-cell text-muted">{{ $article->created_at->format('d M') }}</td>
                    <td><a href="{{ route('admin.articles.show', $article->id) }}">{{ $article->title }}</a></td>
                    <td class="d-none d-md-table-cell">{{ $article->type }}</td>
                    <td class="d-none d-md-table-cell p-0">
                        @if ($article->files->count())
                            <a href="{{ route('admin.articles.show', $article->id) }}">
                                <img src="{{ $article->files[0]->path }}" alt="{{ $article->title }}" height="48">
                            </a>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST">
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
            {{ $articles->links('components.pagination') }}
        </div>
    </main><!-- /.container -->
@endsection()
