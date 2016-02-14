@extends('template')
@section("title")
    Reférent
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    Bienvenue Sur la pages de gestion des <b>PRODUIT</b>
                    <br>
                    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nouveau produit</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/produit/create') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nom Produit</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nom" value="{{ old('produit') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Producteur</label>
                                <div class="col-md-6">
                                    <select class=form-control name="producteur">
                                        @foreach ($producteurs as $prod)                    
                                        <option value={{$prod->id}}>{{$prod->nom." ".$prod->prenom}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">type de Panier</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="panier" value="{{ old('typepanier') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Periodicite</label>
                                <div class="col-md-6">
                                     <select class=form-control name="periode">
                                        <option value="1">Bi-mensuel semaine paire</option>
                                        <option value="2">Bi-mensuel semaine impaire</option>
                                        <option value="3">Hebdomadaire</option>
                                        <option value="4">Ponctuel</option>
                                        <option value="5">Mensuel semaine paire</option>
                                        <option value="6">Mensuel semaine impaire</option>
                                        <option value="7">Hebomadaire ou Bi-mensuel</option>      
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Type de Prix</label>
                                <div class="col-md-6">
                                    <input type="text"  class="form-control" name="typeprix" value="{{ old('typeprix') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Prix unitaire</label>
                                <div class="col-md-6">
                                    <input type="number" step="any" class="form-control" name="prixunitaire" value="{{ old('prixunitaire') }}">
                                </div>
                            </div>  
                            
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>

                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
        </div>
    </div>
@endsection