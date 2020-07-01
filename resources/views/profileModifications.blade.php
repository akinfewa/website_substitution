<!-- view profile reset mdp/mail-->

<!-- Header -->
@extends ('layouts.layout')

@section('contenu')

<br/>
<br/>
<br/>

    <div class="text-center" style="padding:5px; width:75%; margin:auto; border:8px solid #padding:5px; width:75%; margin:auto; border:8px solid #e0e0e0; background-color:#e0e0e0; -moz-border-radius:20px; -khtml-border-radius:20px; -webkit-border-radius:20px; border-radius:20px;; background-color:#padding:5px; width:75%; margin:auto; border:8px solid black; background-color:#e0e0e0; -moz-border-radius:20px; -khtml-border-radius:20px; -webkit-border-radius:20px; border-radius:20px;; -moz-border-radius:20px; -khtml-border-radius:20px; -webkit-border-radius:20px; border-radius:20px;">
        </br>
        </br>
        <br/>
        <p class="general">
        <B>Pour changer votre mot de passe :</B>
        </br></br>
        </p>
        <form method ="post">
        {{csrf_field()}}
        <input type="hidden" name="whichOne" value="password"/>
        <input type="email" name="email" placeholder="Adresse e-mail"/>
        <input type="password" name="password" placeholder="Ancien mot de passe"/>
        <input type="password" name="newPassword" placeholder="Nouveau mot de passe"/>
        <input type="submit" value="Modifier"/>
        </form>
        <br/>
        <br/>
        <hr width="100%" color="black">
        <br/>
        <br/>
        <p class="general"><b>Pour changer votre adresse e-mail :</B>
            </br>
            <br/>
        </p>
        <form method ="post">
            {{csrf_field()}}
            <input type="hidden" name="whichOne" value="email"/>
            <input type="email" name="email" placeholder="Ancienne adresse e-mail"/>
            <input type="password" name="password" placeholder="votre mot de passe"/>
            <input type="email" name="newEMail" placeholder="Nouvelle e-mail"/>
            <input type="submit" value="Modifier"/>
        </form>
        <br/>
        <br/>
        <br/>
        <br/>
    </div>
<br/>
<br/>
<br/>
@endsection
