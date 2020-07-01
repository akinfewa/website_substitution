@extends ('layouts.layout')

@section('contenu')

</br>
</br>
{{--    <div class="encadrement">--}}
        <div class="text-center" style="padding:5px; width:75%; margin:auto; border:8px solid #padding:5px; width:75%; margin:auto; border:8px solid #e0e0e0; background-color:#e0e0e0; -moz-border-radius:20px; -khtml-border-radius:20px; -webkit-border-radius:20px; border-radius:20px;; background-color:#padding:5px; width:75%; margin:auto; border:8px solid black; background-color:#e0e0e0; -moz-border-radius:20px; -khtml-border-radius:20px; -webkit-border-radius:20px; border-radius:20px;; -moz-border-radius:20px; -khtml-border-radius:20px; -webkit-border-radius:20px; border-radius:20px;">
            </br>
            <em><B>Vos renseignements et commandes</B></em>
            </br>
			<form method="post">
            <?php
            echo ('<input type="hidden" name="ID" value="'.$profile[0]->id.'" />');
            echo ('<input type="hidden" name="whichOne" value="profile" />'); ?>
			{{csrf_field()}}
				<hr width="100%" color="black">
				</br>
				Votre nom est <em>
				<?php
					echo('<input type="text" name="name" value="'.$profile[0]->name.'"/>');
				?> 
				</em>
				</br>
				</br>
				<hr width="100%" color="black">
				</br>
				Votre prénom est <em>
				<?php
					echo('<input type="text" name="name" value="'.$profile[0]->first_name.'"/>');
				?></em>
				</br>
				</br>
				<hr width="100%" color="black">
				</br>
				Votre entreprise est <em>
				<?php
					echo('<input type="text" name="name" value="'.$profile[0]->company.'"/>');
				?> </em>
				</br>
				</br>
				<hr width="100%" color="black">
				</br>
				Votre email est <em>
				<?php
					echo($profile[0]->email);
				?></em>
				</br>
			</form>
			</br>
            <hr width="100%" color="black">
            </br>
            Vos différentes commandes :
            </br>
            </br><em>
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
            </em>
    </br>

        <form method="post">
            {{csrf_field()}}
            <?php
            echo ('<input type="hidden" name="ID" value="'.$orders[$i]->ID.'" />');
            echo ('<input type="hidden" name="whichOne" value="order" />'); ?>
            <input type="checkbox" name="received">
            <button type="submit"value="Submit">Envoyer</button>
        </form>

            </br>
			<?php
                        break;
                }
                if($orders[$i]->ShippingState < 3){
                    echo('Votre commande de '.$orders[$i]->Quantity.' '.($products[($orders[$i]->ID_Product)-1]->Name).$message.'</br>');
                }
            }
            ?>
    </br>
            <hr width="100%" color="black">
        </br><B>
        Si vous avez un souci, sur vos renseignements personnels ou votre commande,
    </br>
        On vous invite à aller sur la rubrique Contact</B>
            </br>
            </br>
            </br>
    </div>
{{--    </div>--}}
</br>
</br>
@endsection
