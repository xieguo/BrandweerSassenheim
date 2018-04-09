<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Brandweer Sassenheim</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body{!! (@$admin) ? ' class="admin"' : '' !!}>

<header class="header py-3">
    <div class="container">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-9 pt-1 header-logo d-flex">
                <a href="/" class="d-flex line-height-1 pt-2 text-white no-hover">
                    <svg class="flex-column" width="40px" height="46px" viewBox="0 0 118 137" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Brandweer_Nederland-2" transform="translate(-37.000000, -24.000000)" fill="#D6AE23">
                                <g id="Group" transform="translate(37.000000, 24.000000)">
                                    <path d="M51.237,80.864 C47.01,70.272 37.606,61.912 34.54,52.618 C31.606,53.534 28.833,54.609 26.342,55.881 C27.358,79.77 40.564,95.067 51.25,103.089 C54.719,93.532 53.827,87.347 51.237,80.864" id="Fill-3"></path>
                                    <path d="M74.654,39.21 C85.149,40.695 94.92,43.64 102.576,48.114 C102.555,64.941 97.816,78.644 91.237,89.454 L101.342,101.034 C110.457,87.105 117.157,69.002 117.157,46.323 C105.322,37.501 87.726,32.403 69.221,31.002 C70.715,33.748 72.615,36.615 74.654,39.21" id="Fill-4"></path>
                                    <path d="M14.772,48.114 C14.792,64.941 19.532,78.644 26.111,89.454 L16.005,101.034 C6.89,87.105 0.19,69.002 0.19,46.323 C9.172,39.628 21.474,35.08 34.969,32.657 C33.988,35.594 33.435,38.39 33.232,41.002 C26.376,42.661 20.065,45.02 14.772,48.114" id="Fill-5"></path>
                                    <path d="M58.674,136.714 C51.321,134.202 39.457,127.538 28.327,116.272 L38.306,104.839 C45.695,112.13 53.313,116.891 58.674,119.296 C64.035,116.891 71.653,112.13 79.042,104.839 L89.02,116.272 C77.891,127.538 66.027,134.202 58.674,136.714" id="Fill-6"></path>
                                    <path d="M73.906,80.773 C82.184,69.578 82.131,58.861 80.803,52.037 C84.495,53.051 87.953,54.322 91.006,55.881 C89.732,85.841 69.272,102.327 58.674,107.835 C57.225,107.083 55.581,106.102 53.836,104.932 C72.475,81.929 54.436,60.195 51.246,55.776 C48.036,51.33 44.118,44.657 42.763,38.635 C40.548,28.788 42.234,15.036 57.634,0.652 L58.674,1.072 C51.27,14.927 52.084,22.746 55.186,31.407 C58.582,40.893 70.906,53.543 73.454,64.939 C74.446,69.355 74.622,74.673 73.07,80.514 L73.906,80.773" id="Fill-7"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span class="flex-column d-inline-block pt-2 pl-3">
                        <strong class="d-block">Post Sassenheim</strong>
                        <small>Brandweer Hollands-Midden</small>
                    </span>
                </a>
            </div>
            <div class="col-3 d-flex justify-content-end align-items-center">
                <div class="btn-group" role="group">
                    @auth
                        @if (@$admin)
                            <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm">Terug naar website</a>
                        @else
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm">Administratie</a>
                        @endif

                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                &nbsp;
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="{{ route('admin.reports.create') }}">Uitruk toevoegen</a>
                                <a class="dropdown-item" href="{{ route('admin.articles.create') }}">Artikel toevoegen</a>
                                <a class="dropdown-item" href="{{ route('admin.tips.create') }}">Tip toevoegen</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Uitloggen</a>
                                <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">{{ csrf_field() }}</form>
                            </div>
                        </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Inloggen</a>
                @endif
                </div>
            </div>
        </div>
    </div>
</header>

@if (@$admin)
    <div class="nav-scroller py-1 bg-secondary border-bottom">
        <div class="container">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-white{{ Request::is('admin/dashboard*') ? ' font-weight-bold' : '' }}" href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
                <a class="p-2 text-white{{ Request::is('admin/reports*') ? ' font-weight-bold' : '' }}" href="{{ route('admin.reports.index') }}">
                    Uitrukken
                </a>
                <a class="p-2 text-white{{ Request::is('admin/articles*') ? ' font-weight-bold' : '' }}" href="{{ route('admin.articles.index') }}">
                    Artikelen
                </a>
                <a class="p-2 text-white{{ Request::is('admin/tips*') ? ' font-weight-bold' : '' }}" href="{{ route('admin.tips.index') }}">
                    Tips
                </a>
            </nav>
        </div>
    </div>
@else
    <div class="nav-scroller py-1 border-bottom navbar-dark">
        <div class="container">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted{{ Request::is('/') ? ' font-weight-bold' : '' }}" href="/">
                    Actueel
                </a>
                <a class="p-2 text-muted{{ Request::is('brandveiligheid*') ? ' font-weight-bold' : '' }}" href="/brandveiligheid">
                    Brandveiligheid
                </a>
                <a class="p-2 text-muted{{ Request::is('uitrukken*') ? ' font-weight-bold' : '' }}" href="{{ route('reports.index') }}">
                    Uitrukken
                </a>
                <a class="p-2 text-muted{{ Request::is('p2000*') ? ' font-weight-bold' : '' }}" href="{{ route('p2000') }}">
                    P2000
                </a>
                <a class="p-2 text-muted{{ Request::is('contact*') ? ' font-weight-bold' : '' }}" href="{{ route('contact') }}">
                    Contact
                </a>
            </nav>
        </div>
    </div>
@endif

<div class="bg-light py-4">
    @yield('content')
</div>

<footer class="border-top">
    <div class="container py-5 clearfix">
        <div class="float-left">
            <div class="d-flex">
                <div class="d-flex-column">
                    <svg width="40px" height="46px" viewBox="0 0 118 137" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Brandweer_Nederland-2" transform="translate(-37.000000, -24.000000)" fill="#D6AE23">
                                <g id="Group" transform="translate(37.000000, 24.000000)">
                                    <path d="M51.237,80.864 C47.01,70.272 37.606,61.912 34.54,52.618 C31.606,53.534 28.833,54.609 26.342,55.881 C27.358,79.77 40.564,95.067 51.25,103.089 C54.719,93.532 53.827,87.347 51.237,80.864" id="Fill-3"></path>
                                    <path d="M74.654,39.21 C85.149,40.695 94.92,43.64 102.576,48.114 C102.555,64.941 97.816,78.644 91.237,89.454 L101.342,101.034 C110.457,87.105 117.157,69.002 117.157,46.323 C105.322,37.501 87.726,32.403 69.221,31.002 C70.715,33.748 72.615,36.615 74.654,39.21" id="Fill-4"></path>
                                    <path d="M14.772,48.114 C14.792,64.941 19.532,78.644 26.111,89.454 L16.005,101.034 C6.89,87.105 0.19,69.002 0.19,46.323 C9.172,39.628 21.474,35.08 34.969,32.657 C33.988,35.594 33.435,38.39 33.232,41.002 C26.376,42.661 20.065,45.02 14.772,48.114" id="Fill-5"></path>
                                    <path d="M58.674,136.714 C51.321,134.202 39.457,127.538 28.327,116.272 L38.306,104.839 C45.695,112.13 53.313,116.891 58.674,119.296 C64.035,116.891 71.653,112.13 79.042,104.839 L89.02,116.272 C77.891,127.538 66.027,134.202 58.674,136.714" id="Fill-6"></path>
                                    <path d="M73.906,80.773 C82.184,69.578 82.131,58.861 80.803,52.037 C84.495,53.051 87.953,54.322 91.006,55.881 C89.732,85.841 69.272,102.327 58.674,107.835 C57.225,107.083 55.581,106.102 53.836,104.932 C72.475,81.929 54.436,60.195 51.246,55.776 C48.036,51.33 44.118,44.657 42.763,38.635 C40.548,28.788 42.234,15.036 57.634,0.652 L58.674,1.072 C51.27,14.927 52.084,22.746 55.186,31.407 C58.582,40.893 70.906,53.543 73.454,64.939 C74.446,69.355 74.622,74.673 73.07,80.514 L73.906,80.773" id="Fill-7"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="d-flex-column pl-3 pt-2 line-height-1">
                    <strong>Post Sassenheim</strong><br>
                    Brandweer Hollands-Midden
                </div>
            </div>
        </div>

        <div class="float-right">
            <ul class="list-inline text-small">
                <li class="list-inline-item">
                    <a class="text-muted" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</footer>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
