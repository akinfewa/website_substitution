@extends ('layouts.layout')
@section('contenu')
	<?php
		for($i=0;$i<$number;$i++){
			$name = $users[$orders[$number-1]->ID_USERS-1]->Name;
			$product = $products[$orders[$number-1]->ID_Product-1]->Name;
			$quantity = $orders[$i]->Quantity;
			$shippingState = $orders[$i]->ShippingState;
			$display = 'commande de '.$name.' : '.$quantity.' '.$product;
			echo ($display.'<br/>
			<form method="post">');?>
				{{csrf_field()}}
				<?php 
				echo ('<input type="hidden" name="ID" value="'.$orders[$i]->ID.'" />');?>
				<div>
			<?php	switch($shippingState){
					case 0 :
						echo ('Valider la commande : </br>
						<input type="radio" value="yes" name="validated">
						<label for="yes">yes</label>
					</div>
					<div>
						<input type="radio" value="no" name="validated" checked>');
						break;
					case 1 :
						echo ('La commande a été construite : </br>
						<input type="radio" value="yes" name="builded">
						<label for="yes">yes</label>
					</div>
					<div>
						<input type="radio" value="no" name="builded" checked>');
						break;
					case 2 :
						echo ('La commande a été envoyée : </br>
						<input type="radio" value="yes" name="shipped">
						<label for="yes">yes</label>
					</div>
					<div>
						<input type="radio" value="no" name="shipped" checked>');
						break;
					case 3 :
						echo ('La commande a été reçue : </br>
						<input type="radio" value="yes" name="received">
						<label for="yes">yes</label>
					</div>
					<div>
						<input type="radio" value="no" name="received" checked>');
						break;
					}
					echo('<label for="no">no</label>
				</div>
				<button type="submit"value="Submit">Submit</button>
			</form>');
		}
	?>
@endsection