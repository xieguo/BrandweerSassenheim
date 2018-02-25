@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <nav class="d-none d-md-block" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.tips.index') }}">Tips</a></li>
                <li class="breadcrumb-item active">Toevoegen</li>
            </ol>
        </nav>

        <h2 class="border-bottom pb-2">
            Tip toevoegen
        </h2>

        <form method="POST" action="{{ route('admin.tips.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            @include('admin.tips.form')
        </form>

    </main><!-- /.container -->
@endsection()
