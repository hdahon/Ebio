@extends('template')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <h1>Ajouter une nouvelle catégorie de produit</h1>
            <br>
            <h2>Nouvelle catégorie</h2>
            @if (count($errors) > 0)
                <div class="alert alert-warning" role="alert">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/create-categorie') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="libelle">Libelle</label>
                    <input id="libelle" type="text" class="form-control" name="libelle" value="{{ old('libelle') }}">
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
                 <label for="typePanier">type de Panier</label>
                    <input id="typePanier" type="text" class="form-control" name="typePanier" value="{{ old('typePanier') }}">
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
                    <label>Referent</label>
                    <select>
                        @foreach ($referents as $ref)                    
                        <option value={{$ref->id}}>{{$ref->nom." ".$ref->prenom}}</option>
                    @endforeach
                    </select>
                    
                </div>  
                
                <button type="submit" class="btn waves-effect waves-light">Ajouter</button>
                <a href="{{url('liste-categorie/') }}" class="waves-effect waves-light btn">Retour</a>
            </form>

        </div>
    </div>
@endsection