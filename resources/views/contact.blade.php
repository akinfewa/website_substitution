<!-- View contact -->
<!-- Header -->
@extends ('layouts.layout')
<!--
    This page provides the site contacts
    -->
@section('contenu')
    <!-- Head -->
    <!-- Image Top -->
    <img class="image_contact" src="img/contact.png" width=100% height=80% alt="Information Contact CESI">
    <br/>
    <br>
    <br/>
    <br/>
    <!-- Information in card-->
    <div class="container" align="center">
        <div class="row justify-content">

            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="contact_title">Par téléphone</h2>
                        <p class="card-text">Appelez le centre d'appels<br>
                        <p class="card-text">Service disponible de 9h à 12h et de 14h à 17h du lundi au vendredi.</p>
                    </div>
                    <div class="contact_color"><strong>
                            <p>04 72 18 89 89</p></strong>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="contact_tittle">Écrivez-nous !</h2>
                        <p class="card-text">Un problème technique sur votre commande ? Écrivez au Fabman du CESI de Lyon</p>
                        <p class="card-text">Envoyer vos questions/demandes à l'adresse suivante :</p>
                    </div>
                    <div class="contact_color"><strong>
                            <p>bdenaeyer@cesi.fr</p></strong>
                    </div>
                    <p class="card-text">Une question technique sur le site ? Écrivez aux créateurs du site</p>
                    <p class="card-text">Envoyer vos questions/remarques aux adresses suivantes :</p>
                    <div class="contact_color"><strong>
                            <p>Thomas.Rivollet@viacesi.fr</p></strong>
                        <strong>
                            <p>Damien.Robert1@viacesi.fr</p></strong>
                        <strong>
                            <p>Amine.Ghoumid@viacesi.fr</p></strong>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <br/>
    <br/>
    <br/>
    <br/>

@endsection
