<!-- view connection -->
<!-- Create a cookie with token -->
<!-- Header -->
@extends ('layouts.layout')

@section('contenu')

    <!-- Body for connection-->
    <div id="container">
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- title -->
        <h5 id="connection" align="center">Connexion</h5>
        <form method="POST" autocomplete="on" class="border mb-5 mt-5 mr-auto ml-auto col-4">
        <!-- Information -->
            <div class="form-group mt-3">
                <label for="email" class="uname" data-icon="u"> Adresse mail : </label>
                <input id="email" name="email" class="form-control" required="required" value="" type="text"
                       placeholder="cesiLyon@viacesi.fr"/>
            </div>
            <div class="form-group">
                <label for="password" class="youpasswd" data-icon="p"> Mot de passe : </label>
                <input id="password" name="password" class="form-control" required="required" type="password"
                       placeholder="CesiMDP123"/>
            </div>
        <!-- submit button -->
            <div class="text-center">
                <button type="submit" class="btn btn-outline-primary mt-2 text " id="btn-sumbit">Se connecter</button>
            </div>
            <!-- Refresh password -->
            <p class="change_link text-center mb-0 mt-3">
                <a href="#toregister" class="to_register mr-2"> Mot de passe oublié ?</a><a href="/inscription" class="to_register ml-2">Pas encore inscrit ?</a>
            </p>

        </form>
    </div>
    <br>
    <br>
    <br>
    <br>

@endsection
