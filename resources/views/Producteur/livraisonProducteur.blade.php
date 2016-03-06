@extends('template')
@section("title")
    Mes Livraisons
@endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    Bienvenue sur la page de gestion des <b>Livraisons</b>
                    <br>

                    <!-- liste des livraisons livraisons @TODO: implémenter des liens sur la lsite des paniers -->
                    <table class="table  table-bordered">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Livraison</th>
                            <th>Producteur</th>
                            <th>Date de Livraison</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($name as $row)
                        <tr>
                            <td>
                                {{$row->id}}
                            </td>
                            <td>
                                {{$row->producteur_id}}
                            </td>
                            <td>
                                {{$row->dateDeLivraison}}
                            </td>
                        </tr>

                         @endforeach       
                        </tbody>
                    </table>


                </div>
                <div>
                    Nombre de panier pour la semaine suivante : <!-- requete ici 1ere semaine -->
                    Nombre de panier pour la semaine d'après  : <!-- requete ici 2ième semaine -->
                </div>
            </div>
        </div>
    </div>
@endsection