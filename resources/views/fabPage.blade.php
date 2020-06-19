@extends ('layouts.layout')
@section('contenu')
	<?php
		for($i=0;$i<$number;$i++){
			$name = $users[$orders[$number-1]->ID_USERS-1]->Name;
			$product = $products[$orders[$number-1]->ID_Product-1]->Name;
			$quantity = $orders[$i]->Quantity;
			$shippingState = $orders[$i]->ShippingState;
			$display = 'commande de '.$name.' : '.$quantity.' '.$product.'</br>';
			switch($shippingState){
				case 0 : 
					echo ($display.'La commande n\'a pas encore étée validée, soiuhaitez-vous la valider ? (si vous répondez non, la commande sera refusée) : <br/>');
					break;
				case 1 : 
					echo ($display.'La commande est en construction, soiuhaitez-vous affirmer que la commande a été construite ? (si vous répondez non, la commande ne sera plus validée) : <br/>');
					break;
				case 2 : 
					echo ($display.'La commande est construite, soiuhaitez-vous affirmer que la commande a été envoyée ? (si vous répondez non, la commande sera affichée comme étant en construction) : <br/>');
					break;
				case 3 : 
					echo ($display.'La commande a été envoyée, le commanditaire vous notifiera lorsqu\'il aura reçu la commande <br/>');
					break;
			} if($shippingState < 3 && $shippingState >=0){ ?>
			<form method="post">
				{{csrf_field()}}
				<?php 
				echo ('<input type="hidden" name="ID" value="'.$orders[$i]->ID.'" />');?>
				<div>
					<input type="radio" value="yes" name="nextStep">
					<label for="yes">yes</label>
				</div>
				<div>
					<input type="radio" value="no" name="nextStep" checked>
					<label for="no">no</label>
				</div>
				<button type="submit"value="Submit">Submit</button>
			</form><?php 
			}
		}
	?>
@endsection