<!-- view boutique -->
<!-- Header -->
@extends ('layouts.layout')
<!--
    This page shows us the items to sell
    -->
<!--Start Content -->

@section('contenu')


    <h4 class="categorie p-5 text-muted" align="center">Produits :</h4>
    <div class="container">
        <div class="row justify-content">


            <!-- Information -->
                <div class="col-md-7 col-9 mb-6">
                    <div class="card">
                        <img class="card-img-top border-bottom-1" src="img/visires2.1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nom </h5>
                            <p class="card-text">Description</p>
                        </div>
                        <!-- add button -->

                            <form class="card-footer"  action="/connexion" method="GET">
                                <small class="text-muted">
                                    <button type="submit" class="btn btn-outline-primary form-control">ajouter
                                        au panier<i class="ml-1 fas fa-cart-arrow-down"></i></button>
                                </small>
                            </form>

                    </div>
                </div>
        </div>
    </div>
    <br>

@endsection

<!-- End Content -->
