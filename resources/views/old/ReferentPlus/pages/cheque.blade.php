@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @include("/ReferentPlus/menu")
                    <div class="panel-body">
                        Bienvenue Sur la pages de gestion des <b>CHEQUE</b>
                        <br>  
                                         <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Remise cheque</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/paiement/new') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Mois</label>
                                <div class="col-md-6">
                                    <select class=form-control name="mois" >
                                        @foreach ($mois as $m)                    
                                        <option value={{$m}}>{{$m}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-md-4 control-label">Adherant</label>
                                <div class="col-md-6">
                                    <select class=form-control name="amapien" onchange="test()">
                                        @foreach ($adherants as $adherant)                    
                                        <option value={{$adherant->id}}>{{$adherant->nom." ".$adherant->prenom}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-md-4 control-label">Contrat</label>
                                <div class="col-md-6">
                                    <select class=form-control id="prod" name="produit" onchange="test()">
                                        <option selected>Selectionnez un contrat </option>
                                        @foreach ($contrats as $key=>$prod)                    
                                        <option id={{$prod->prix."e".$prod->periodicite_id}} value={{$prod->id}} >{{$categories[$prod->id]->libelle." - ".$adherants[$key]->prenom." ".$adherants[$key]->nom}}</option>
                                        @endforeach
                                        
                                    </select>                                
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Numero de cheque</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="numero" value="{{ old('numero') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Banque</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="banque" value="{{ old('banque') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Titulaire</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="titulaire" value="{{ old('titulaire') }}">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-md-4 control-label">quantite</label>
                                <div class="col-md-6">
                                    <input type="number" id="nbPanier" class="form-control" name="nbPanier" value="{{ old('nbPanier') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">prix unitaire</label>
                                <div class="col-md-6">
                                    <input type="number " id="prix" class="form-control"  name="cout" value="{{ old('cout') }}">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Montant</label>
                                <div class="col-md-6">
                                    <input type="number" id="montant" class="form-control" name="montant" value="{{ old('montant') }}">
                                </div>
                            </div> 
                             <div class="form-group">
                                <label class="col-md-4 control-label">Autre</label>
                                <div class="col-md-6">
                                    <input type="text" id="autre" class="form-control" placeholder="" name="autre" value="{{ old('autre') }}">
                                </div>
                            </div> 

                                <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary" onclick="test()">Ajouter</button>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection