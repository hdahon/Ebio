@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Produits</th>
                            <th>Date de livraison</th>
                            <th>Producteur </th>
                            <th>Action</th>
<!--                             <th><a href="{{ url('create-livraisons') }}" title="Ajouter" class="btn  btn-success btn-sm">AJOUTER</a></th>
 -->                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($livraisons  as $key=> $row)
                        <tr>
                            <td>
                                {{$categories[$key]->libelle}}
                            </td>
                            <td>
                                {{$row->dateLivraison}}
                            </td>
                            <td>
                                {{$producteurs[$key]->prenom}} {{$producteurs[$key]->nom}} 
                            </td>
                            
                            <td>
                                @if(session('role') ==1)
                                 <a href="{{ url('create-panier/'.$row->id) }}" title="new" class="btn  btn-info btn-sm">Panierr</a>
                                @else
                                <a href="{{ url('editer-livraisons/'.$row->id) }}" title="Modifier" class="btn  btn-warning btn-sm">Editer la fiche</a>
<!--                                 <a href="{{ url('delete-livraisons/'.$row->id) }}" title="Supprimer" class="btn  btn-danger btn-sm confirm">SUPPRIMER</a>
 -->                                @endif
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