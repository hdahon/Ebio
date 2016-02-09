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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/create-produit') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nom Produit</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nom" value="{{ old('produit') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Catégories</label>
                                <div class="col-md-6">
                                    <select class=form-control name="categorie">
                                        @foreach ($categories as $cat)                    
                                        <option value={{$cat->id}}>{{$cat->libelle}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Unite</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="panier,1kg,0.4kg" name="unite" value="{{ old('typepanier') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Prix</label>
                                <div class="col-md-6">
                                    <input type="number" step="any" class="form-control" name="prix" value="{{ old('prix') }}">
                                </div>
                            </div>  
                            
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-info btn-sm">Ajouter</button>
                                    <a href="{{url('liste-produit') }}" class="btn btn-info btn-sm">Retour</a>
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