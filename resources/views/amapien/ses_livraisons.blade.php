@extends('template')
@section("title")
    Mes Livraisons
@endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

                
                    <h1>Bienvenue sur la page de gestion des <b>Livraisons</b></h1>
                    <br>

                    <!-- liste des livraisons livraisons @TODO: implémenter des liens sur la lsite des paniers -->
                    <table class="table  table-striped">
                        <thead>
                        <tr>
                            <th>Livraison id</th>
                            <th>Date de livraison</th>
                            <th>Produit id</th>
                            <th>Producteur id</th>
                            <th>Quantité </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($name as $row)
                        <tr>
                            <td>
                                {{$row->id}}
                            </td>
                            <td>
                                {{$row->dateLivraison}}
                            </td>
                            <td>
                                {{$row->produit_id}}
                            </td>
                            <td>
                            	{{$row->producteur_id}}
                            </td>
                            <td>
                                {{$row->quantite}}
                            </td>
                        </tr>

                         @endforeach       
                        </tbody>
                    </table>



                <div>
                    Nombre de panier pour la semaine suivante : <!-- requete ici 1ere semaine -->
                    Nombre de panier pour la semaine d'après  : <!-- requete ici 2ième semaine -->
                </div>

        </div>
    </div>
@endsection