@extends('template')
@section("title")
    Reférent
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Bienvenue Sur la pages de gestion des <b>PRODUIT</b></h1>
            <h2>Nouveau produit</h2>
            @if (count($errors) > 0)
                <div class="alert altert-warning">
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
                            <label for="nom">Nom Produit</label>
                            <input id="nom" type="text" class="form-control" name="nom" value="{{ old('produit') }}">
                            
                    </div>

                    <div class="form-group">
                            <label>Producteur</label>
                            <select>
                                @foreach ($producteurs as $prod)                    
                                <option value={{$prod->id}}>{{$prod->nom." ".$prod->prenom}}</option>
                                @endforeach   
                            </select> 
                    </div>
                
                    <div class="form-group">
                        <label for="panier">type de Panier</label>
                        <input id="panier" type="text" class="form-control" name="panier" value="{{ old('typepanier') }}">
                    </div>
                
                    <div class="form-group">
                        <label>Periodicite</label>
                        <select>
                            <option value="1">Bi-mensuel semaine paire</option>
                            <option value="2">Bi-mensuel semaine impaire</option>
                            <option value="3">Hebdomadaire</option>
                            <option value="4">Ponctuel</option>
                            <option value="5">Mensuel semaine paire</option>
                            <option value="6">Mensuel semaine impaire</option>
                            <option value="7">Hebomadaire ou Bi-mensuel</option>      
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label for="typeprix">Type de Prix</label>
                        <input id="typeprix" type="text"  class="form-control" name="typeprix" value="{{ old('typeprix') }}">
                    </div>
                
                    <div class="form-group">
                        <label for="prixunitaire">Prix unitaire</label>
                        <input id="prixunitaire" type="number" step="any" class="form-control" name="prixunitaire" value="{{ old('prixunitaire') }}">  
                    </div>

                    <button type="submit" class="btn btn-default">Ajouter</button>        
            </form>

        </div>
    </div>
@endsection