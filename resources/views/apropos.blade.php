<!-- view information CESI school-->
<!-- Header -->
@extends ('layouts.layout')
<!--
    This page provides information about the school to users
    -->
@section('contenu')

    <img src="img/etudiant.png" class="image_etudiant" width="2185" height="550" alt="Photo Etudiant Cesi" title="Etre etudiants CESI">
    <!-- Information -->
    <div class="container mt-2">
        <div class="row justify-content">
            <div class="col-md-12 col-12">
                <div class="card-body">
                    <h2 class="card-title text-center">Bonjour à Vous !</h2>
                    <h3 class="card-subtitle mb-2 text-muted text-center">Si vous êtes ici, c'est que vous voulez en savoir plus sur notre école</h3>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <br/>

    <p class="text-center"><strong>Voici une petite vidéo de présentation du Cesi Lyon, pour l'occasion</strong></p>
    <br/>
    <br/>
    <!-- Information video too -->
    <div class="video-responsive text-center">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/D3-tfUDRa1E" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen alt="Video presnetation CESI"></iframe>
    </div>
    <br/>
    <br/>

@endsection
