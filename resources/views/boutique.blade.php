<!-- view boutique -->

<!-- Header -->
@extends ('layouts.layout')

<!--
    This page shows us the items to sell
    -->

<!--Start Content -->

@section('contenu')

    <div class="back">

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
                                <?php if($product[$i]->ProdCapacity>0){ ?>
                                    <form class="card-footer"  method="POST">
                                        {{csrf_field()}}
                                        <small class="text-muted">
                                            <p class="general">Le maximum actuellement est égal à : <?php echo($product[$i]->ProdCapacity) ?></p>
                                            <input type="hidden" name="ID" value=" <?php echo($product[$i]->ID) ?> ">
                                            <input type="number" name="Quantity" min="1" max="<?php echo($product[$i]->ProdCapacity) ?>" value="0" class="col-sm-8 text-center">
                                        </br>
                                            </br>
                                            <button type="submit" class="btn btn-outline-dark form-control">Commander</button>
                                        </small>
                                    </form>
                                <?php }else { ?>
                                    <p class="general"> Nous nous excusons, mais nous sommes actuellement dans l'incapacité de d'assurer la production de <?php echo($product[$i]->Name) ?></p>
                                <?php } ?>
                        </div>
                    </div><?php
                } ?>
            </div>

        <br>
        <br>
        <br>

    </div>

@endsection

<!-- End Content -->
