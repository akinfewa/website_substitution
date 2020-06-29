@extends ('layouts.layout')
@section('contenu')
	<?php
		for($i=0;$i<$number;$i++){
			$name = $users[$orders[$i]->ID_USERS-1]->name;
			$product = $products[$orders[$i]->ID_Product-1]->Name;
			$quantity = $orders[$i]->Quantity;
			$shippingState = $orders[$i]->ShippingState;
			$display = 'commande de '.$name.' : '.$quantity.' '.$product.'</br>';
			switch($shippingState){
				case 0 :
					echo ($display.'La commande n\'a pas encore étée validée, souhaitez-vous la valider ? (si vous répondez non, la commande sera refusée) : <br/>');
					break;
				case 1 :
					echo ($display.'La commande est en construction, souhaitez-vous affirmer que la commande a été construite ? (si vous répondez non, la commande ne sera plus validée) : <br/>');
					break;
				case 2 :
					echo ($display.'La commande est construite, souhaitez-vous affirmer que la commande a été envoyée ? (si vous répondez non, la commande sera affichée comme étant en construction) : <br/>');
					break;
				case 3 :
					echo ($display.'La commande a été envoyée, le commanditaire vous notifiera lorsqu\'il aura reçu la commande <br/>');
					break;
			} if($shippingState < 3 && $shippingState >=0){ ?>
			<form method="post">
				{{csrf_field()}}
				<?php
				echo ('<input type="hidden" name="ID" value="'.$orders[$i]->ID.'" />');
				echo ('<input type="hidden" name="whichOne" value="orders" />');?>
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
		}?> 
		Voici les differentes capacite de production que vous avez signifier pour les différents produits, il est important de les tenir à jour régulièrement
		puisqu'elles permettent de limiter ou non les différentes commandes :
		<form method="post">
			{{csrf_field()}}
			<?php
			for($i=0;$i<$number_products;$i++){ ?>
				<?php
				echo ('<input type="hidden" name="whichOne" value="products" />');?>
				<div>
				<?php
				echo ('<input type="number" name="'.$products[$i]->ID.'" value="'.$products[$i]->ProdCapacity.'" />');?>
				</div>
				<button type="submit"value="Submit">Submit</button><?php
			} ?>
		</form> 
@endsection
