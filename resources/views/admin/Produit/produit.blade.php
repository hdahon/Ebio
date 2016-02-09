@extends('template')
@section("title")
Reférent
@endsection
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            @include("menu")
            <div class="panel-body">
                Liste des produits<br><br>
                <br>
                <table class="table  table-bordered">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Produit</th>
                            <th>Referent</th>
                            <th>Producteur</th>
                            <th>Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($name as $row)
                        <tr>
                            <td>
                                {{$row->nomProduit}}
                            </td>
                            <td>
                                {{$row->referent->nom}}
                            </td>
                            <td>
                                {{$row->producteur->nom}}
                            </td>
                            <td>
                                <a href="{{ url('produit/deleteProduit/'.$row->id) }}" title="Supprimer">SUPPRIMER</a>
                                -
                                <a href="{{ url('produit/update/'.$row->id) }}" title="Modifier">MODIFIER</a>
                            </td>
                        </tr>
                        @endforeach       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection