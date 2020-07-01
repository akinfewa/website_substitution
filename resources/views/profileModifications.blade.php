@extends ('layouts.layout')

@section('contenu')
Pour changer votre mot de passe :
<form method ="post">
	{{csrf_field()}}
	<input type="hidden" name="whichOne" value="password"/>
	<input type="email" name="email" placeholder="Votre adresse e-mail"/>
	<input type="password" name="password" placeholder="votre ancien mot de passe"/>
	<input type="password" name="newPassword" placeholder="votre nouveau mot de passe"/>
	<input type="submit" value="modifier"/>
</form>
Pour changer votre adresse e-mail :
<form method ="post">
	{{csrf_field()}}
	<input type="hidden" name="whichOne" value="email"/>
	<input type="email" name="email" placeholder="votre ancienne adresse e-mail"/>
	<input type="password" name="password" placeholder="votre mot de passe"/>
	<input type="email" name="newEMail" placeholder="votre nouvelle adresse e-mail"/>
	<input type="submit" value="modifier"/>
</form>


@endsection