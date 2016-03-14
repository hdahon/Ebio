@extends('template')
@section('content')
<?php  

    if(Session::has('role') and Auth::check()){
        $niveau = session('role');
    } else {
        $niveau = 0;
    }
    $leRole = "amapien";

    switch ($niveau){
      case 5:{
            $leRole="admin";
            break;
      }
      case 4:{
            $leRole="référent plus";
            break;
      }
      case 3:{
            $leRole="référent";
            break;
      }
      case 2:{
            $leRole="producteur";
            break;
      }
      case 1:{
            $leRole="amapien";
            break;
      }
    }

?>
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                        <h1>Bienvenue, {{$user->nom}} sur la page {{$leRole}}</h1>
                  
                        Voici vos informations: 
                        <ul>
                        	<li>Votre nom : {{$user->nom}}</li>
                        	<li>Votre prénom : {{$user->prenom}}</li>
                        	<li>Votre mail: {{$user->email}}</li>
                        	<li>Votre numéro de téléphone: {{$user->tel}}</li> 
                        	<li>Votre rôle au sein de l'association : {{$role}} </li>
                        </ul>

                        @if ($niveau!=5)
                        <h2>Voici les informations de votre conjoint: </h2>
                        <ul>
                        	<li>Nom  de votre conjoint: {{$user->nomCAdherant}}</li>
                        	<li>Prénom de votre conjoint: {{$user->prenomCAdherant}}</li>
                        	<li>Mail de votre conjoint: {{$user->emailCAdherant}}</li>
                        	<li>Numéro de téléphone de votre conjoint : {{$user->telCAdherant}}</li> 
                        </ul>
                        {!! link_to_route('amap_change_data','Changer ses informations',array(),array('class'=>'waves-effect waves-light btn')) !!}
                        @endif
            </div>
        </div>

@endsection