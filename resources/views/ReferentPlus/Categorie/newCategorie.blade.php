@extends('template')
@section("title")
    Reférent
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @include("ReferentPlus/menu")
                <div class="panel-body">
                    <h2>Ajouter une nouvelle catégorie de produit</h2>
                    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nouvelle catégorie</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/create-categorie') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Libelle</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="libelle" value="{{ old('libelle') }}">
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
                                    <input type="text" class="form-control" name="typePanier" value="{{ old('typePanier') }}">
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
                                <label class="col-md-4 control-label">Referent</label>
                                <div class="col-md-6">
                                    <select class=form-control name="referent">
                                        @foreach ($referents as $ref)                    
                                        <option value={{$ref->id}}>{{$ref->nom." ".$ref->prenom}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>  
                            
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-info btn-sm">Ajouter</button>
                                    <a href="{{url('liste-categorie/') }}" class="btn btn-info btn-sm">Retour</a>               

                                </div>
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