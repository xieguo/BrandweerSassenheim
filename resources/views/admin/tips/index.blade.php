@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <nav class="d-none d-md-block" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.tips.index') }}">Artikelen</a></li>
            </ol>
        </nav>

        <div class="float-right">
            <a href="{{ route('admin.tips.create') }}" class="btn btn-outline-success">Toevoegen</a>
        </div>

        <h2 class="border-bottom pb-2">
            Artikelen
        </h2>

        <table class="table">
            <thead>
            <tr>
                <th class="border-top-0 d-none d-md-table-cell">#</th>
                <th class="border-top-0" scope="col">Artikel</th>
                <th class="border-top-0" scope="col">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tips as $tip)
                <tr>
                    <th class="d-none d-md-table-cell">{{ $tip->id }}</th>
                    <td><a href="{{ route('admin.tips.show', $tip->id) }}">{{ $tip->description }}</a></td>
                    <td>
                        <form action="{{ route('admin.tips.destroy', $tip->id) }}" method="POST">
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
            {{ $tips->links('components.pagination') }}
        </div>
    </main><!-- /.container -->
@endsection()
