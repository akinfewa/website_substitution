<!-- view events -->
<!-- Header -->
@extends ('layouts.layout')

@section('contenu')
    <!--
    This page is allows to be added to the database
    to give and access the events
    -->

    <div id="register" class="animate form">
        <form  method="POST" autocomplete="on" class="border mb-5 mt-5 mr-auto ml-auto col-4">

        <!-- title -->
            <h4 class="mt-3">Veuillez remplir ce formulaire pour votre inscription</h4>

            <!-- Information -->
            <div class="form-group">
                <label>Nom : </label>
                <input name="lastName" required="required" type="text" value="" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Prénom : </label>
                <input name="firstName" required="required" type="text" value="" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Entreprise : </label>
                <input name="Entreprise" required="required" type="text" value="" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Adresse Mail : </label>
                <input name="email" required="required" type="email" placeholder="exemple@gmail.com" value="" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Mot de passe : </label>
                <input name="password" required="required" type="password" placeholder="Mot de passe" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Confirmation Mot de passe : </label>
                <input  name="password_confirmation" required="required" type="password" placeholder="Mot de passe (Confirmation)" class="form-control"/>
            </div>
            <!-- termes -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" required id="defaultChecked2" >
                <label class="custom-control-label" for="defaultChecked2">J'ai lu et j'accepte <a href="/politique">la politique de confidentialité</a></label>
            </div>
            <!-- register button -->
            <p class="signin button text-center">
                <button type="submit" class="btn btn-outline-primary mt-2 text">Envoyer</button>
            </p>
        </form>
    </div>
@endsection
