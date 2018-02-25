@extends('layouts.app')

@section('content')
    <main role="main" class="container mt-4">
        <div class="row">
            <div class="col-md-8 blog-main">
                <nav class="d-none d-md-block" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </nav>

                <h2 class="border-bottom pb-2">
                    Contact
                </h2>

                <address>
                    <strong>Brandweer Hollands Midden</strong><br>
                    Kazerne Sassenheim<br>
                    Parklaan 176<br>
                    2171 EK Sassenheim<br>
                    <abbr title="Phone">Tel:</abbr> 088-246 5000<br>
                    <abbr title="Fax">Fax:</abbr> 088-246 5001<br>
                    <abbr title="Email">Email:</abbr> <a href="mailto:info@brandweer.vrhm.nl">info@brandweer.vrhm.nl</a>
                </address>

                <hr>

                <h3>Wij zoeken vrijwilligers</h3>
                <p>
                    De kazerne in Sassenheim is op zoek naar brandweervrijwilligers. Iets voor jou?:<br>
                    <a href="https://www.brandweer.nl/hollands-midden/vrijwilliger-worden/vrijwilliger-worden">https://www.brandweer.nl/hollands-midden/vrijwilliger-worden/vrijwilliger-worden</a>
                </p>

                <p>Nadere informatie over het werken als vrijwilliger bij de kazerne Sassenheim kun je inwinnen bij:</p>

                <p>
                    Ploegchef: Wilco Jorna<br>
                    E-mailadres: <a href="mailto:wilco.jorna@brandweer.vrhm.nl">wilco.jorna@brandweer.vrhm.nl</a>
                </p>


                <p>Met vragen over de sollicitatieprocedure kun je terecht bij de afdeling Personeel, e-mail: <a href="mailto:personeel@brandweer.vrhm.nl">personeel@brandweer.vrhm.nl</a></p>

                <hr>

                <p>Als u vragen of opmerkingen heeft over deze website kun je contact opnemen met de webmaster, e-mail <a href="mailto:brandweerssm@gmail.com">brandweerssm@gmail.com</a></p>
            </div><!-- /.blog-main -->

            @include('components.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection()
