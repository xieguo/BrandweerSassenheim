@extends('layouts.app')

@section('content')
    <main role="main" class="container mt-4">
        <div class="row">
            <div class="col-md-8 blog-main">
                <nav class="d-none d-md-block" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">P2000</li>
                    </ol>
                </nav>

                <h2 class="border-bottom pb-2">
                    P2000 monitor
                </h2>

                <iframe frameborder="0" height="1500" src="http://brandweersassenheim.nl/p2000/p2000.php" width="100%"></iframe>
            </div><!-- /.blog-main -->

            @include('components.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection()
