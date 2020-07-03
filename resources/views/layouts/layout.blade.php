<!DOCTYPE html>

<html>

<head>
    <!--  title of the Page -->
    <title>Solidarity Bond</title>

    <!--  SEO -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="description" content="BDE CESI Lyon est une site de dons de visières pour partenariat">

    <!-- Includes -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


    <!-- Body -->
<body style="background-color:#FFFAFA;">
<header>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #eeee;">
    <a class="navbar-brand" href="/">
        <img src="{{asset('img/Logo1.jpg')}}" width="60" height="60" alt="Logo BDE">
    </a>
    <a class="navbar-brand ac" href="/">Solidarity Bond</a>

    <button class="navbar-toggler tc" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <span class="border border-primary"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <div class="col-sm">

            <ul class="navbar-nav">

                <!-- Compare NavBar connect or no -->

                @if( auth()->check() )
                <li class="nav-item active">
                    <a class="nav-link" href="/">Accueil</a>
                </li>
                    <?php
                    if(Auth::user()->Fabman == 1){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/FabPage">Admin</a>
                    </li>
                    <?php }
                    ?>
                <li class="nav-item">
                    <a class="nav-link" href="/boutique">Boutique</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/myProfile">Profil</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="/apropos">A propos</a>
                </li>
                    <li class="nav-item">
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Déconnexion</a>
                </li>

                @else

                <li class="nav-item active">
                    <a class="nav-link" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/boutique">Boutique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/apropos">A propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            @endif
        <!-- Notification -->
            </ul>
        </div>
        </div>
    </div>
        <form class="form-inline" >
                <div class="notifications_cloche">
                    <button type="button" style="margin-right: 25px" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#modal"><i class="far fa-bell" ></i></button>
                </div>
                <div class="notification_rouge">
                    <img src="img/red_dot.png" width=25% height=25% alt="Signification de notif">
                </div>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Centre de notification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                        </div>
                        <div class="modal-body">
                            <p>ICI THOMAS</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </nav>
</header>

    <!-- Footer -->

@yield ('contenu')

<footer class="page-footer text-white">
    <br>

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h6 id="footer_color_title_reseaux" class="font-weight-bold text-dark  mt-3 mb-4">Réseau Sociaux</h6>

                <ul class="list-unstyled">
                    <li>
                        <a href="https://www.facebook.com/solidarity.bond/" class="text-dark "><i style="font-size:24px" class="fa">&#xf082; </i> SOLIDARITY BOND</a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/Solidarity__Bond/" class="text-dark"><i style="font-size:24px" class="fa">&#xf16d; </i> SOLIDARITY BOND</a>
                    </li>

                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h6 id="footer_color_title_contact" class="font-weight-bold text-dark mt-3 mb-4">Nous contacter</h6>

                <ul class="list-unstyled">
                    <li>
                        <a class="text-dark">
                            bdenaeyer@cesi.fr
                        </a>
                    </li>
                    <li>
                        <a class="text-dark"><i class="fas fa-phone-square-alt"></i> 04 72 18 89 89</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h6 id="footer_color_title_mentions" class="font-weight-bold text-dark mt-3 mb-4"> Mentions légales</h6>

                <ul class="list-unstyled">
                    <li>
                        <a href="/conditions" class="text-dark"><i class="fas fa-conditions"></i>Conditions générales</a>
                    </li>
                    <li>
                        <a href="/politique" class="text-dark"><i class="fas fa-politique"></i>Données personnelles et politique de
                            confidentialité</a>
                    </li>
                </ul>


            </div>

            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->

            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->

            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center text-dark"> © 2020 Copyright:
        <a href="https://ecole-ingenieurs.cesi.fr/" class="text-dark">cesilyon.fr</a>
    </div>
    </br>
    </br>
</footer>
</body>
<!-- Footer -->

</html>
