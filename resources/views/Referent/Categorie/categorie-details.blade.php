@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                   
                    <div class="panel-body">
                      <a href="{{url('categorie-liste/') }}" class="btn btn-info btn-sm">Retour</a>
                       <h1 class="text-center">Détails de la catégorie {{$categories->libelle}}</h1>
                        
                        </div>
                         <div class="row">
                                <div class="col-sm-6">
                                    <p><b> Categorie :</b> {{$categories->libelle}}</p>
                                    <p><b> Type de Panier :</b> {{$categories->typePanier}}</p>
                                    <p><b> Periodicite:</b> {{$periodicite}}</p>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Producteur :</b> {{$producteur}}</p>
                                    <p><b>Referent : </b>{{$referent}}</p>
                                </div>
                    </div>
                     <h2 class="text-center">Liste des produits de {{$categories->libelle}} </h2>
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
                                {{$row->nomProduit}}
                            </td>
                            <td>
                                {{$row->unite}}
                            </td>
                             <td>
                                {{$row->prix}} euros
                            </td>
                             <td>
                            <a href="{{ url('categorie-details/'.$categories->id) }}">
                                {{$categories->libelle}}
                            </a>
                            </td>
                            <td>
                                 <a href="{{ url('details-produit/'.$row->id) }}" class="btn  btn-info btn-sm">Détails</a>
                             </td>
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