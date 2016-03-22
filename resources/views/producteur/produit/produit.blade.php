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
                        @foreach ($produits as $key => $row)
                        <tr>
                            <td>
                                {{$row[$key]->nomProduit}}
                            </td>
                            <td>
                                {{$row[$key]->unite_id}}
                            </td>
                             <td>
                                {{$row[$key]->prix}} euros
                            </td>
                             
                            <td>
                                 <a href="{{ url('produit-details/'.$row[$key]->id) }}" class="btn  btn-info btn-sm">Détails</a>
                                 @if(session('role')>=3)
                                 <a href="{{ url('produit-modifier/'.$row[$key]->id) }}" class="btn  btn-info btn-sm">Modifier</a>
                                 <a href="{{ url('/produit-supprimer/'.$row[$key]->id) }}" class="btn  btn-danger btn-sm confirm">Supprimer</a>
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
@endsection