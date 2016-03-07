@extends('template')
@section("title")
Reférent
@endsection
@section('content')
<<<<<<< HEAD
=======
<<<<<<< HEAD:resources/views/pages/newProduit.blade.php
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            @include("menu")
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
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">créer</button>
                                            </div>
                                        </div>

                                    </form>
=======
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
>>>>>>> 22405344179a9cb6d7f0e6918127bde687719a61

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
              
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
                                            <div class="input-field col s1">
                                                <select class=form-control name="producteur">
                                                    @foreach ($producteurs as $prod)                    
                                                    <option value={{$prod->id}}>{{$prod->nom." ".$prod->prenom}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">créer</button>
                                            </div>
                                        </div>

                                    </form>
   
                                </div>
                            </div>
<<<<<<< HEAD
=======
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
>>>>>>> 40f047dc2175be9afc5d3bc704ba4511a9adbc4f:resources/views/ReferentPlus/Produit/newProduit.blade.php

                                </div>
                            </div>
>>>>>>> 22405344179a9cb6d7f0e6918127bde687719a61
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection