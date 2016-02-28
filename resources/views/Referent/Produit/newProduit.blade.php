@extends('template')
@section("title")
    Reférent
    @endsection
@section('content')
    <div class="row">
        <div class="col s10 offset-s1">
            <h1>Bienvenue Sur la pages de gestion des <b>PRODUIT</b></h1>
            <h2>Nouveau produit</h2>
            @if (count($errors) > 0)
                <div class="red lighten-4">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form role="form" method="POST" action="{{ url('/produit/create') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="input-field col s6">
                            <input id="nom" type="text" class="validate" name="nom" value="{{ old('produit') }}">
                            <label for="nom">Nom Produit</label>
                    </div>

                    <div class="input-field col s6">
                            <select>
                                @foreach ($producteurs as $prod)                    
                                <option value={{$prod->id}}>{{$prod->nom." ".$prod->prenom}}</option>
                                @endforeach
                                
                            </select>
                        <label>Producteur</label>
                    </div>
                
                    <div class="input-field col s6">
                        <input id="panier" type="text" class="form-control" name="panier" value="{{ old('typepanier') }}">
                        <label for="panier">type de Panier</label>
                    </div>
                
                    <div class="input-field col s6">
                         <select>
                            <option value="1">Bi-mensuel semaine paire</option>
                            <option value="2">Bi-mensuel semaine impaire</option>
                            <option value="3">Hebdomadaire</option>
                            <option value="4">Ponctuel</option>
                            <option value="5">Mensuel semaine paire</option>
                            <option value="6">Mensuel semaine impaire</option>
                            <option value="7">Hebomadaire ou Bi-mensuel</option>      
                        </select>
                        <label>Periodicite</label>
                    </div>
                
                    <div class="input-field col s6">
                        <input id="typeprix" type="text"  class="form-control" name="typeprix" value="{{ old('typeprix') }}">
                        <label for="typeprix">Type de Prix</label>
                    </div>
                
                    <div class="input-field col s6">
                        <input id="prixunitaire" type="number" step="any" class="form-control" name="prixunitaire" value="{{ old('prixunitaire') }}">
                        <label for="prixunitaire">Prix unitaire</label>
                    </div>

                    <button type="submit" class="btn waves-effect waves-light">Ajouter</button>        
            </form>

        </div>
    </div>
@endsection