@extends('template')
@section('content')

<?php
    $role = Auth::user()->roleamapien_id;
?>
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                <div class="panel-heading">Changer vos informations de compte:</div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('amapien/save') }}" accept-charset="UTF-8">

                        {!! csrf_field() !!} 
                        <h3><span class="label label-default">Vos informations</span></h3>
                        <div class="form-group">
                              <label class="col-md-4 control-label" for="nom">Nom</label>
                              <div class="col-md-6">
                                    <input class="form-control" name="nom" type="text" id="nom" placeholder="Nom" value="{{$userInfo->nom}}"> 
                              </div>  
                        </div>
                        <div class="form-group">
                              <label class="col-md-4 control-label" for="prenom">Prenom</label>
                              <div class="col-md-6">
                                    <input class="form-control" name="prenom" type="text" id="prenom" placeholder="Prenom" value="{{$userInfo->prenom}}">   
                              </div>  
                        </div>
                        <div class="form-group">
                              <label class="col-md-4 control-label" for="mail">Email</label>
                              <div class="col-md-6">
                                    <div class="input-group">
                                          <span class="input-group-addon " id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
                                          <input class="form-control" aria-describedby="basic-addon1" name="mail" type="email" id="mail" placeholder="Email@foo.com" value="{{$userInfo->email}}">
                                    </div>
                              </div> 
                        </div>
                        <div class="form-group">
                              <label class="col-md-4 control-label" for="tel">Tel</label>
                              <div class="col-md-6">
                                    <div class="input-group">
                                          <span class="input-group-addon " id="basic-addon1"><span class="glyphicon glyphicon-phone"></span></span>
                                          <input name="tel" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" type="tel" id="tel" class="form-control" placeholder="06XXXXXXXX" value="{{$userInfo->tel}}">
                                    </div>  
                              </div>  
                        </div>
                        <div class="form-group">
                              <label class="col-md-4 control-label" for="adresse">Adresse</label>
                              <div class="col-md-6">
                                    <input class="form-control" name="adresse" type="text" id="adresse" placeholder="Adresse" value="{{$userInfo->adresse}}">   
                              </div>  
                        </div>
                        @if ($role==2)
                        <div class="form-group">
                              <label class="col-md-4 control-label" for="numSiret">Num Siret</label>
                              <div class="col-md-6">
                                    <input class="form-control" name="numSiret" type="text" id="numSiret" placeholder="Num Siret" value="{{$userInfo->numSiret}}">   
                              </div>  
                        </div>
                        @endif


                        <div id="div_oldMDP" class="form-group">
                              <label class="col-md-4 control-label">Mot de passe</label>
                              <div class="col-md-6">
                                    <input type="password" disabled class="form-control" id="password" name="password" value="{{$userInfo->password}}">
                              </div>
                        </div>

                        <div id="div_newMDP">
                              <div class="form-group">
                                    <label class="col-md-4 control-label">Nouveau mot de passe</label>
                                    <div class="col-md-6">
                                          <input type="password" class="form-control" id="newPassword" name="newPassword" value="">
                                    </div>
                              </div>
                              <div class="form-group">
                                    <label class="col-md-4 control-label">Confirmer le mot de passe</label>
                                    <div class="col-md-6">
                                          <input type="password" class="form-control" id="newPassword2" name="newPassword2" value="">
                                    </div>
                              </div>
                        </div>

                        <div class="form-group">
                              <label class="col-md-4 control-label"></label>
                              <div class="col-md-6">
                                    <button type="button" id="bt_modifMDP" class="btn btn-link btn">Modifier le mot de passe ?</button>
                              </div>
                        </div>
                        <input type="hidden" class="form-control" id="chp_newMDP" name="chp_newMDP" value="false">

                        @if (count($conjointInfo)>0)
                        <h3><span class="label label-default">Les informations de votre conjoint</span></h3>
                        <br>

                        <div class="form-group">
                              <label class="col-md-4 control-label" for="nomC">Nom</label>
                              <div class="col-md-6">
                                    <input name="nomC" type="text" id="nomC" class="form-control" placeholder="Nom de votre conjoint" value="{{$conjointInfo->nom}}">    
                              </div> 
                        </div>


                        <div class="form-group">
                              <label class="col-md-4 control-label" for="prenomC">Prénom</label>
                              <div class="col-md-6">
                                    <input name="prenomC" type="text" id="prenomC" class="form-control" placeholder="Prenom de votre conjoint" value="{{$conjointInfo->prenom}}">
                              </div> 
                        </div>

                        <div class="form-group">
                              <label class="col-md-4 control-label" for="mailC">Email</label>
                              <div class="col-md-6">
                                    <div class="input-group">
                                          <span class="input-group-addon" id="basic-addon1">@</span>
                                          <input name="mailC" type="email" aria-describedby="basic-addon1" id="mailC" class="form-control"  placeholder="Email de votre conjoint" value="{{$conjointInfo->email}}">  
                                    </div>
                              </div> 
                        </div>

                        <div class="form-group">
                              <label class="col-md-4 control-label" for="telC">Tel</label>
                              <div class="col-md-6">
                                    <div class="input-group">
                                          <span class="input-group-addon " id="basic-addon1"><span class="glyphicon glyphicon-phone"></span></span>
                                          <input name="telC"  pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$"  type="tel" id="telC" class="form-control" placeholder="Numero de votre conjoint" value="{{$conjointInfo->tel}}">  
                                    </div>  
                              </div> 
                        </div>
                        <div class="form-group">
                              <label class="col-md-4 control-label" for="adresseC">Adresse</label>
                              <div class="col-md-6">
                                    <input class="form-control" name="adresseC" type="text" id="adresseC" placeholder="Adresse" value="{{$conjointInfo->adresse}}">   
                              </div>  
                        </div>
                        @if ($role==2)
                        <div class="form-group">
                              <label class="col-md-4 control-label" for="numSiretC">Num Siret</label>
                              <div class="col-md-6">
                                    <input class="form-control" name="numSiretC" type="text" id="numSiretC" placeholder="Num Siret" value="{{$conjointInfo->numSiret}}">   
                              </div>  
                        </div>
                        @endif
                        @endif
                        <button type="submit" class="btn btn-default">Sauvegarder</button>

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
</div>

@endsection