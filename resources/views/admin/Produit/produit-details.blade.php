@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                       <a href="{{url('liste-produit/') }}" class="btn btn-info btn-sm">Retour</a>
                       <h2>Détails du produit {{$produit->nomProduit}}</h2>
                         <div class="row">
                                <div class="col-sm-6">
                                    <p><b>Produit :</b> {{$produit->nomProduit}}</p>
                                    <p><b>Categorie :</b> {{$categorie->libelle}}</p>
                                    <p><b>Type de Panier :</b> {{$categorie->typePanier}}</p>
                                    <p><b>Unité :</b> {{$produit->unite}}</p>
                                    <p><b>Prix:</b> {{$produit->prix}}</p>
                                    <p><b>Periodicite:</b> {{$periodicite}}</p>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Producteur :</b> {{$producteur}}</p>
                                    <p><b>Referent : </b>{{$referent}}</p>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection