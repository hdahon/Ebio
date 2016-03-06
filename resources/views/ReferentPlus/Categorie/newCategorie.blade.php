@extends('template')

@section('content')
    <div class="row">
        <div class="col s11 offset-s1">
            <h1>Ajouter une nouvelle catégorie de produit</h1>
            <br>
            <h2>Nouvelle catégorie</h2>       
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

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/create-categorie') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                    <label for="libelle">Libelle</label>
                    <input id="libelle" type="text" class="form-control" name="libelle" value="{{ old('libelle') }}">
                    
                </div>

                @if($producteurs)
                <div class="form-group">
                    <label>Producteur</label>
                    <select>
                        <option value=""> choix</option>
                        @foreach ($producteurs as $prod)                  
                        <option value={!!"\"".$prod->id."\"" !!}>{!! $prod->nom." ".$prod->prenom!!}</option>
                        @endforeach  
                </div>
                @endif


                <div class="form-group">
                    <label for="typePanier">Type de Panier</label>
                    <input id="typePanier" type="text" class="form-control" name="typePanier" value="{!! old('typePanier') !!}"> 
                </div>

                <div class="form-group">
                         <label>Periodicite</label><br><br>
                         <select>
                            <option value=""> choix</option>
                            <option value="1">Bi-mensuel semaine paire</option>
                            <option value="2">Bi-mensuel semaine impaire</option>
                            <option value="3">Hebdomadaire</option>
                            <option value="4">Ponctuel</option>
                            <option value="5">Mensuel semaine paire</option>
                            <option value="6">Mensuel semaine impaire</option>
                            <option value="7">Hebomadaire ou Bi-mensuel</option>      
                        </select>
                        
                </div>


                @if($referents)
                <div class="form-group">
                    <label>Referent</label><br><br>
                    <select class="brower-default">
                    @foreach ($referents as $ref)                    
                    <option value={!! "\"". $ref->id."\"" !!}>{!! $ref->nom." ".$ref->prenom !!}</option>
                    @endforeach
                    </select> 
                </div>
                @endif
                
                
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Ajouter</button>
                    <a href="{{url('liste-categorie/') }}">Annuler</a>
                </div>

            </form>
        </div>
    </div>
@endsection