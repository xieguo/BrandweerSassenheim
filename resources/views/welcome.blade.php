<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Brandweer Sassenheim</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>

    <header class="header py-3">
        <div class="container">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-12 col-md-7 pt-1 header-logo d-flex">
                    <div class="flex-column pr-3">
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
                    <div class="flex-column line-height-1 pt-2">
                        <a href="#" class="text-white">
                            <strong class="d-block">Post Sassenheim</strong>
                            <small>Brandweer Hollands-Midden</small>
                        </a>
                    </div>
                </div>
                <div class="col-4 d-none d-md-flex justify-content-end align-items-center">
                    <a class="btn btn-sm btn-outline-light" href="#">Abonneren</a>
                </div>
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-4 bg-light border-bottom navbar-dark">
        <div class="container">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted font-weight-bold" href="#">Actueel</a>
                <a class="p-2 text-muted" href="#">Brandveiligheid</a>
                <a class="p-2 text-muted" href="#">Uitrukken</a>
                <a class="p-2 text-muted" href="#">P2000</a>
                <a class="p-2 text-muted" href="#">Contact</a>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-150 overflow-hidden">
                    <a href="#" class="card-link card-body d-flex flex-column align-items-start text-dark">
                        <h3 class="mb-2">Vlam in de pan!</h3>
                        <p class="card-text">Tips om een vlam in de pan veilig te blussen en te voorkomen.</p>
                    </a>
                    <img class="card-img-right flex-auto d-none d-lg-block" alt="Title goes here" style="width: 200px; height: 150px;" src="https://placehold.it/200x150">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-150 overflow-hidden">
                    <a href="#" class="card-link card-body d-flex flex-column align-items-start text-dark">
                        <h3 class="mb-2">Vlam in de pan!</h3>
                        <p class="card-text">Tips om een vlam in de pan veilig te blussen en te voorkomen.</p>
                    </a>
                    <img class="card-img-right flex-auto d-none d-lg-block" alt="Title goes here" style="width: 200px; height: 150px;" src="https://placehold.it/200x150">
                </div>
            </div>
        </div>
    </div>

    <hr>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <!--<h3 class="pb-3 mb-4 border-bottom">
                    Recent nieuws
                </h3>-->

                @for ($i = 0; $i < 10; $i++)
                    <div class="card flex-md-row mb-4 box-shadow">
                        <div class="card-body d-flex flex-column align-items-start">
                            <h5 class="mb-0">
                                <a class="text-dark" href="#">P2 Meting Nicolaas Damesstraat Sassenheim</a>
                            </h5>
                            <div class="mb-1 text-muted">Nov 11</div>
                            <p class="card-text mb-2 d-none d-lg-block">Wederom is een gelhaard aanleiding geweest voor een bezoek van de brandweer zoals dit ook eind vorig jaar het geval was..</p>
                            <a href="#">Lees meer</a>
                        </div>
                        <img class="card-img-right flex-auto d-none d-md-block" alt="Title goes here" style="width: 200px; height: 175px;" src="https://placehold.it/200x150">
                    </div>
                    <!--<div class="card flex-row mb-4-5 border-0">
                        <a href="#" class="d-block card-img-left flex-auto w-20 bg-cover bg-center" style="background-image: url(https://s3-eu-west-1.amazonaws.com/cdn.brandweersassenheim.nl/medium/956IMG_6484_resized.JPG);"></a>
                        <div class="card-body d-flex flex-column align-items-start py-0">
                            <h5>
                                <a class="text-dark" href="#">Automobilist ramt pui ISD Bollenstreek Lisse Lorum ipsum dolor sit amster hwgbhjreb</a>
                            </h5>
                            <p class="card-text text-md mb-auto text-muted">LISSE  2018-01-22  Vanmiddag is een automobilist met zijn auto bij de ISD Bollenstreek ( Intergemeentelijke Sociale Dienst ) aan de Hobahostra..</p>
                        </div>
                    </div>-->
                @endfor
            </div><!-- /.blog-main -->

            <aside class="col-md-4 blog-sidebar">
                <div class="tweets d-none d-md-block">
                    <a class="twitter-timeline" href="https://twitter.com/BrandweerSSM" data-widget-id="421660290472628224">Tweets van @BrandweerSSM</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>

                <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">About</h4>
                    <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div>

                <div class="p-3">
                    <h4 class="font-italic">Archives</h4>
                    <ol class="list-unstyled mb-0">
                        <li><a href="#">March 2014</a></li>
                        <li><a href="#">February 2014</a></li>
                        <li><a href="#">January 2014</a></li>
                        <li><a href="#">December 2013</a></li>
                        <li><a href="#">November 2013</a></li>
                        <li><a href="#">October 2013</a></li>
                        <li><a href="#">September 2013</a></li>
                        <li><a href="#">August 2013</a></li>
                        <li><a href="#">July 2013</a></li>
                        <li><a href="#">June 2013</a></li>
                        <li><a href="#">May 2013</a></li>
                        <li><a href="#">April 2013</a></li>
                    </ol>
                </div>

                <div class="p-3">
                    <h4 class="font-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="border-top bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md d-none d-md-block">
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
                            Brandweer Sassenheim
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md">
                    <h5>Features</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Cool stuff</a></li>
                        <li><a class="text-muted" href="#">Random feature</a></li>
                        <li><a class="text-muted" href="#">Team feature</a></li>
                        <li><a class="text-muted" href="#">Stuff for developers</a></li>
                        <li><a class="text-muted" href="#">Another one</a></li>
                        <li><a class="text-muted" href="#">Last time</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Resource</a></li>
                        <li><a class="text-muted" href="#">Resource name</a></li>
                        <li><a class="text-muted" href="#">Another resource</a></li>
                        <li><a class="text-muted" href="#">Final resource</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Business</a></li>
                        <li><a class="text-muted" href="#">Education</a></li>
                        <li><a class="text-muted" href="#">Government</a></li>
                        <li><a class="text-muted" href="#">Gaming</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Team</a></li>
                        <li><a class="text-muted" href="#">Locations</a></li>
                        <li><a class="text-muted" href="#">Privacy</a></li>
                        <li><a class="text-muted" href="#">Terms</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
