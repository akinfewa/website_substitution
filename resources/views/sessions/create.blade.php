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
        <h5 id="connection" align="center" class="titre">Connexion</h5>
        <br>
        <br>
        <br>
        <form method="POST" action="/login" autocomplete="on" class="border mb-8 mt-8 mr-auto ml-auto col-7">
          {{ csrf_field() }}
        <!-- Information -->
            <div class="form-group mt-3">
                <br>
                <br>
                <br>
                <label for="email" class="uname" data-icon="u"> Adresse mail : </label>
                <input id="email" name="email" class="form-control" required="required" value="" type="email"
                       placeholder="cesiLyon@viacesi.fr" required/>
            </div>
              <br>
            <div class="form-group">
                <label for="password" class="youpasswd" data-icon="p"> Mot de passe : </label>
                <input id="password" name="password" class="form-control" required="required" type="password"
                       placeholder="CesiMDP123" required/>
            </div>
              <br>
        <!-- submit button -->
            <div class="text-center">
                <button type="submit" class="btn btn-outline-secondary mt-2 text " id="btn-sumbit">Se connecter</button>
            </div>
            <!-- Refresh password -->
            <p class="change_link text-center mb-0 mt-3">
                <a href="#toregister" class="to_register text-secondary mr-2"> Mot de passe oublié ?</a>
                <a href="/register" class="to_register text-secondary ml-2">Pas encore inscrit ?</a>
            </p>
              <br>
              <br>
              <br>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>

@endsection
