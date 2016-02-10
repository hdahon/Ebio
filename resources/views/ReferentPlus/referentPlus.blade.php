@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @include("ReferentPlus/menu")
                    <div class="panel-body">
                        Bienvenue <b>{{"  ".$user->prenom." ".$user->nom}}</b>
                        <br>
                         <div class="row">
                                <div class="col-sm-6">
                                    <h2 class="text-left">Mes Info</h2>
                                    <p>Nom : {{$user->nom}}</p>
                                    <p>Prenom : {{$user->prenom}}</p>
                                    <p>Email : {{$user->email}}</p>
                                    <p>Tel : {{$user->tel}}</p>

                                </div>
                                <div class="col-sm-6 " >
                                    <h2 class='text-left'>Info Co-contractant</h2>
                                    <p>Nom : {{$user->nomCAdherant}}</p>
                                    <p>Prenom : {{$user->prenomCAdherant}}</p>
                                    <p>Email : {{$user->emailCAdherant}}</p>
                                    <p>Tel : {{$user->telCAdherant}}</p>
                                </div>
                                <div class=" pull-right" style="margin-right:  10px">
                                <button type="button" class="btn btn-primary" >Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection