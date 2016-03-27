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
                            <th>Type panier</th>
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
                                {{$produits[$key][0]->nomProduit}}
                            </td>
                             <td>           
                                @foreach ($unites as $keyy => $unite)
                                @if($produits[$key][0]->unite_id==$unite->id)
                                {{$unite->libelle}}
                                @endif
                                @endforeach
                            </td>
                             <td>
                                {{$categories[$key]->typePanier}}
                            </td>
                             <td>
                                {{$produits[$key][0]->prix}}€
                            </td>
                             <td>
                            <a href="{{ url('categorie-details/'.$categories[$key]->id) }}">
                                {{$categories[$key]->libelle}}
                            </a>
                            </td>
                            <td>
                                <a href="{{ url('produit-details/'.$produits[$key][0]->id) }}" class="btn  btn-info btn-sm">Détails</a>
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