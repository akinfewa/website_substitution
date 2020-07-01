@extends ('layouts.layout')
@section('contenu')
    <img src="img/banner-935470_1920.jpg" height="50%" width="100%">
    <div class="text-center back">
        <br/>
        <br/>
        <p class="titre"><b>Bienvenue à vous, Monsieur Administrateur !</b></p>
        <p class="generalEcriturev2">Vous pourrais voir ci-dessous les différentes commandes et émettre le nombre disponible de visières visible par les partenaires</p>
{{--        <img src="img/admin.png" height="20%" width="20%">--}}
{{--        <img src="img/admin2.jpg" height="35%" width="35%">--}}
        <br/>
        <hr width="80%" color="blue">
        <br/>
        <p class="general">Les differentes commandes des partenaires</p>
        <br/>
        <hr width="50%" color="blue">
        <br/>
    </div>

    <div class="back generalEcriture">
	<?php
		for($i=0;$i<$number;$i++){
			$name = $users[$orders[$i]->ID_USERS-1]->name;
			$product = $products[$orders[$i]->ID_Product-1]->Name;
			$quantity = $orders[$i]->Quantity;
			$shippingState = $orders[$i]->ShippingState;
			$display = 'Une commande de '.$name.' : '.$quantity.' '.$product.'</br>';
			switch($shippingState){
				case 0 :
					echo ($display.'La commande n\'a pas encore été validée, souhaitez-vous confirmer ? (si vous répondez non, la commande sera refusée) : <br/>');
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

            <div class="general text-center">
                    <br/>

					<input type="radio" value="yes" name="nextStep">
					<label for="yes">YES</label>
                    <br/>
					<input type="radio" value="no" name="nextStep" checked>
					<label for="no">NO</label>

                    <br/>

				<button type="submit"value="Submit">Submit</button>

                    <br/>
                    <br/>
                    <br/>
            </div>
        </form>
    <div class="trait">
    </div>
    </br>
        <?php
			}
		}?>
        <div class="trait">
        </div>
        <br/>
        <br/>
        <p class="general text-center">Pour émettre le nombre de production possible : </p>
        <br/>
        <hr width="50%" color="blue">
        <br/>
		<p class="text-center general">
            Voici les differentes capacités de productions que vous avez signifié pour les différents produits, il est important de les tenir à jour régulièrement
            puisqu'elles permettent de limiter ou non, les différentes commandes :
        </p>
		<form method="post" class="text-center">
			{{csrf_field()}}
			<?php
			for($i=0;$i<$number_products;$i++){ ?>
				<?php
				echo ('<input type="hidden" name="whichOne" value="products" />');?>
				<div>
                <br/>
				<?php
				echo ('<input type="number" name="'.$products[$i]->ID.'" value="'.$products[$i]->ProdCapacity.'" />');?>
				</div>
            <br/>
				<button type="submit"value="Submit">Submit</button>
            <?php
			} ?>
		</form>
        <br/>
        <br/>
        <br/>
        <br/>
    </div>
    <div class="trait">
    </div>
@endsection
