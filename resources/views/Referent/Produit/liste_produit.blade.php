@extends('template')
@section("title")
    Reférent
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <h2>Liste des Produits</h2>
                    <table class="table  table-bordered">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Produit</th>
                            <th>Unité</th>
                            <th>Prix</th>
                            <th>Catégorie</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($produits) > 0)
                        @foreach ($produits as $key=>$row)
                        @if(count($produits[$key]) !=null) 
                        <tr>
                            
                           <td>
                                {{$produits[$key][$key]->nomProduit}}
                            </td>
                             <td>
                                {{$produits[$key][$key]->unite}}
                            </td>
                             <td>
                                {{$produits[$key][$key]->prix}} euros
                            </td>
                             <td>
                            <a href="{{ url('categorie-details/'.$categories[$key]->id) }}">
                                {{$categories[$key]->libelle}}
                            </a>
                            </td>
                            <td>
                                <a href="{{ url('details-produit/'.$produits[$key][$key]->id) }}" class="btn  btn-info btn-sm">Détails</a>
                            </td>
                        </tr>
                        @endif
                         @endforeach 
                         @endif      
                        </tbody>
                        </table>
    </div>
    </div>
        </div>
    </div>
@endsection