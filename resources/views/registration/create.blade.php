<!-- view events -->
<!-- Header -->
@extends ('layouts.layout')

@section('contenu')
    <!--
    This page is allows to be added to the database
    to give and access the events
    -->
<br/>
    <br/>
    <br/>
    <div id="register" class="animate form general">
        <form method="POST" action="/register" autocomplete="on" class="border mb-8 mt-8 mr-auto ml-auto col-7">
          {{ csrf_field() }}

        <!-- title -->
            <h4 class="mt-3">Veuillez remplir ce formulaire pour votre inscription</h4>

            <!-- Information -->
            <div class="form-group">
                <label for "name">Nom : </label>
                <input name="name" required="required" placeholder="Dujardin" type="text" value="" class="form-control"/>
            </div>

            <div class="form-group">
                <label for "first_name">Prénom : </label>
                <input name="first_name" required="required" placeholder="Jean" type="text" value="" class="form-control"/>
            </div>
            <div class="form-group">
                <label for "company">Entreprise : </label>
                <input name="company" required="required" type="text" placeholder="Corporation" value="" class="form-control"/>
            </div>
            <div class="form-group">
                <label for"email">Adresse Mail : </label>
                <input name="email" required="required" type="email" placeholder="exemple@gmail.com" value="" class="form-control"/>
            </div>
            <div class="form-group">
                <label for"password">Mot de passe : </label>
                <input name="password" required="required" type="password" placeholder="Mot de passe" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmation du mot de passe</label>
                <input name="password_confirmation" required="required" type="password" id="password_confirmation" placeholder="Mot de passe (Confirmation)" class="form-control"/>
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
    <br/>
    <br/>
    <br/>
@endsection
