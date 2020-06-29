<!-- view boutique -->
<!-- Header -->
@extends ('layouts.layout')
<!--
    This page shows us the items to sell
    -->
<!--Start Content -->

@section('contenu')


    <h4 class="text-black-50 p-5 text-muted" align="center">Produits :</h4>

    <div class="container">

			<?php for($i=0;$i<$number;$i++){ ?>
            <!-- Information -->
                <div>
                    <div class="card text-center">
                        <img class="card-img-top border-bottom-2" src=" <?php echo($product[$i]->picture); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo($product[$i]->Name) ?> </h4>
                            <hr width="100%" color="black">
                        </br>
                            <p class="card-text"><?php echo($product[$i]->Description) ?> </p>
                            </br>
                            <hr width="100%" color="black">
                            </br>
                            <p class="text-center">PROTEGEONS-NOUS !</p>
                        </div>
                        <!-- Add button -->

                            <form class="card-footer"  method="POST">
								{{csrf_field()}}
                                <small class="text-muted">
                                    <p class="general">Veuillez à bien respecter le nombre d'articles par commande pour afin qu'elle soit prise en compte. (50 maximum)</p>
									<input type="hidden" name="ID" value=" <?php echo($product[$i]->ID) ?> ">
									<input type="number" name="Quantity" min="0" max="50" placeholder="Quantité maximal 50" class="col-sm-8 text-center">
                                </br>
                                    </br>
                                    <button type="submit" class="btn btn-outline-dark form-control">Commander</button>
                                </small>
                            </form>

                    </div>
                </div><?php
			} ?>
        </div>
    </div>
    <br>
    <br>
    <br>

@endsection

<!-- End Content -->
