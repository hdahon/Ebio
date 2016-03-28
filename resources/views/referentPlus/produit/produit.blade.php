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
                     <div class="table-responsive">    
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
                        @foreach ($produits as $key => $row)
                        <tr>
                            <td>
                                {{$row->nomProduit}}
                            </td>
                            <td>
                                {{$unites[$row->id]->libelle}}
                            </td>
                             <td>
                                {{$typePaniers[$row->id]->libelle}}
                            </td>
                             <td>
                                {{$row->prix}}€
                            </td>
                             <td>
                            <a href="{{ url('categorie-details/'.$categories[$row->id]->id) }}">
                                {{$categories[$row->id]->libelle}}
                            </a>
                            </td>
                            <td>
                                 <a href="{{ url('produit-details/'.$row->id) }}" class="btn  btn-info btn-sm">Détails</a>
                                 @if(session('role')>=3)
                                 <a href="{{ url('produit-modifier/'.$row->id) }}" class="btn  btn-info btn-sm">Modifier</a>
                                 <a href="{{ url('/produit-supprimer/'.$row->id) }}" class="btn  btn-danger btn-sm confirm">Supprimer</a>
                                 @endif
                            </td>
                        </tr>

                         @endforeach       
                        </tbody>
                        </table>
                    </div>
    </div>
    </div>
        </div>
    </div>
@endsection