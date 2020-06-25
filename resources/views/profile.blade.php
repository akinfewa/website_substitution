@extends ('layouts.layout')

@section('contenu')
	Nom : 
	<?php 
		echo($profile[0]->name);
	?> </br>
	Prénom : 
	<?php 
		echo($profile[0]->first_name);
	?> </br>
	Company : 
	<?php 
		echo($profile[0]->first_name);
	?> </br>
	email : 
	<?php 
		echo($profile[0]->email);
	?> </br>
	Vos différentes commandes :</br>
	<?php
		for($i = 0; $i<$number; $i++){
			switch($orders[$i]->ShippingState){
				case -1 :
					$message = ' a été refusée, veuillez contacter les différents fablabs pour savoir quelle en est la raison';
					break;
				case 0 :
					$message = ' est en attente de confirmation par l\'un de nos fabmanager';
					break;
				case 1 :
					$message = ' a été acceptée, elle est actuellement en construction';
					break;
				case 2 :
					$message = ' a été produite, elle est en attente d\'envoi';
					break;
				case 3 : $message = 'ERREUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUURE';
					echo('Votre commande de '.$orders[$i]->Quantity.' '.($products[($orders[$i]->ID_Product)-1]->Name).' a été envoyée, vous pouvez cocher la case suivante pour nous informer du reçu de votre commande :'); ?> 
					<form method="post">
						{{csrf_field()}}
						<?php 
						echo ('<input type="hidden" name="ID" value="'.$orders[$i]->ID.'" />');?>
							<input type="checkbox" name="received">
							<button type="submit"value="Submit">Envoyer</button>
					</form></br>
						<?php
					break;
			}
			if($orders[$i]->ShippingState < 3){
				echo('Votre commande de '.$orders[$i]->Quantity.' '.($products[($orders[$i]->ID_Product)-1]->Name).$message.'</br>');
			}
		}
	?>
@endsection