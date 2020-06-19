<!-- view panier -->
<!-- Header -->
@extends ('layouts.layout')

@section('contenu')


    <br>

    <div class="container" align="center">

        <h4><p>Panier</p></h4>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Produit</th>
                <th scope="col">Quantité</th>
                <th scope="col">Supprimer</th>
                <th scope="col">Total</th>
            </tr>
            </thead>
                <tbody>
                <tr>
                    <td>
                        <form method="POST" action="/">
                            <button type="submit" class="btn btn-danger" name="idProduct" value="" >X</button>
                        </form>
                    </td>
                </tr>
                </tbody>
        </table>
        <hr class="hr_panier">

        <div style="display: flex; justify-content: flex-end">
            <div class="inline">
                <p class="text-uppercase"><b>Total:</b>  €</p>
            </div>


        </div>

        <div class="mb-5">
            <small class="text-muted">
                <button type="button" class="btn btn-outline-primary">Commander</button>
            </small>

        </div>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
