@extends('template')
@section("title")
Reférent
@endsection
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">Modifier utilisateur</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('users/update') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Nom</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="nom" value="{{$nom}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Prenom</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="prenom" value="{{$prenom}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Email</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="email" value="{{$email}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Tel</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="tel" value="{{$tel}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Adresse</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="tel" value="{{$adresse}}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Num siret</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="tel" value="{{$numSiret}}" >
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-4 control-label">Rôle</label>
                                            <div class="col-md-6">
                                                <select class="form-control" name="roleamapien_id">
                                                    <option value="1" selected>AMAPIEN</option>
                                                    <option value="2">PRODUCTEUR</option>
                                                    <option value="3">REFERENT</option>
                                                    <option value="4">REFERENT+</option>
                                                    <option value="5">ADMIN</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Co-adhérant</label>
                                            <div class="col-md-6">
                                                <select class="form-control" name="coadherant_id">
                                                   <option value="">selectionner une personne</option> 
                                                   @foreach ($adherants as $a)  
                                                        @if($coadherant_id == $a->id)
                                                            <option selected value={{$a->id}}>{{$a->prenom}} {{$a->nom}}</option>
                                                        @else                  
                                                            <option value={{$a->id}}>{{$a->prenom}} {{$a->nom}}</option>
                                                        @endif   
                                                 @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">MODIFIER</button>
                                            </div>
                                        </div>

                                        <input type="hidden" class="form-control" name="idUser" value="{{$id}}">
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