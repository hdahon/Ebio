@extends('template')
@section('content')

        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                  <h1>Changer vos informations de compte:</h1>
                  <form method="POST" action="{!! url('amapien/save') !!}" accept-charset="UTF-8">
                  {!! csrf_field() !!} 
                  <h2>Vos informations</h2>

                  <div class="form-group">
                        <label for="nom">Votre nom : </label>
                        <input class="form-control" name="nom" type="text" id="nom" placeholder="Nom">   
                  </div>
                  <div class="form-group">
                        <label for="prenom">Votre prenom :</label>
                        <input class="form-control" name="prenom" type="text" id="prenom" placeholder="Prenom">   
                  </div>
                  <div class="form-group">
                        <label for="mail">Votre mail :</label>
                        <input class="form-control" name="mail" type="text" id="mail" placeholder="Email@foo.com">
                  </div>
                  <div class="form-group">
                        <label for="numero">Votre numero :</label>
                        <input name="numero" type="text" id="numero" class="form-control" placeholder="06XXXXXXXX">
                  </div>
                  <h2> Les informations de votre conjoint </h2>
                  <br>

                  <div class="form-group">
                        <label for="nomC">Nom de votre conjoint :</label>
                        <input name="nomC" type="text" id="nomC" class="form-control" placeholder="Nom de votre conjoint">    
                  </div>


                  <div class="form-group">
                        <label for="prenomC">Prenom de votre conjoint : </label>
                        <input name="prenomC" type="text" id="prenomC" class="form-control" placeholder="Prenom de votre conjoint">
                  </div>

                  <div class="form-group">
                        <label for="mailC">Email de votre conjoint :</label>
                        <input name="mailC" type="text" id="mailC" class="form-control"  placeholder="Email de votre conjoint">  
                  </div>



                  <div class="form-group">
                        <label for="numeroC">Numero de votre conjoint :</label>
                        <input name="numeroC" type="text" id="numeroC" class="form-control" placeholder="Numero de votre conjoint">  
                  </div>

                  <button type="submit" class="btn btn-default">Sauvegarder</button>

                  </form>
            </div>
        </div>

@endsection