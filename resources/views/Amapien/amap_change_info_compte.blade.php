@extends('template')
@section('content')
        <div class="row">
            <div class="col s12">
                        <h1>Changer vos informations de comptes:</h1>
                        <form method="POST" action="{!! url('amapien/save') !!}" accept-charset="UTF-8">
                        {!! csrf_field() !!} 
                        <h2> Vos informations : </h2>

                        <div class="row">
                        <div class="input-field col s12">
                              <input name="nom" type="text" id="nom">
                              <label for="nom">Votre nom : </label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="input-field col s12">
                              <input name="prenom" type="text" id="prenom">
                              <label for="prenom">Votre prenom :</label>
                        </div>
                        </div>
                        
                        <div class="row">
                        <div class="input-field col s12">
                        <input name="mail" type="text" id="mail">
                        <label for="mail">Votre mail :</label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="input-field col s12">
                        <input name="numero" type="text" id="numero">
                        <label for="numero">Votre numero :</label>
                        </div>
                        </div>

                        <h2> Les informations de votre conjoints </h2>
                        <br>
                        <div class="row">
                        <div class="input-field col s12">
                        <input name="nomC" type="text" id="nomC">
                        <label for="nomC">Nom de votre conjoint :</label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="input-field col s12">
                        <input name="prenomC" type="text" id="prenomC">
                        <label for="prenomC">Prenom de votre conjoint : </label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="input-field col s12">
                        <input name="mailC" type="text" id="mailC">
                        <label for="mailC">Email de votre conjoint :</label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="input-field col s12">
                        <input name="numeroC" type="text" id="numeroC">
                        <label for="numeroC">Numero de votre conjoint :</label>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col s12">

                              <input class="waves-effect waves-light btn" type="submit" value="Sauvegarder">

                        </div>
                        </div>

                        </form>
            </div>
        </div>

@endsection