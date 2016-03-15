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
                        <h1>Bienvenue {{$user->nom}} sur la page d'accueil {{$leRole}}</h1>
                  
                        Voici vos informations: 
                        <ul>
                        	<li><b>Nom:</b> {{$user->nom}}</li>
                        	<li><b>Prénom :</b> {{$user->prenom}}</li>
                        	<li><b>Email: </b> {{$user->email}}</li>
                        	<li><b>Téléphone: </b> {{$user->tel}}</li> 
                        	<li><b>Votre rôle au sein de l'association : </b>{{$role}} </li>
                        </ul>

                        @if ($niveau!=5)
                        <h2>Voici les informations de votre conjoint: </h2>
                        <ul>
                        	<li>Nom  de votre conjoint: {{$user->nomCAdherant}}</li>
                        	<li>Prénom de votre conjoint: {{$user->prenomCAdherant}}</li>
                        	<li>Mail de votre conjoint: {{$user->emailCAdherant}}</li>
                        	<li>Numéro de téléphone de votre conjoint : {{$user->telCAdherant}}</li> 
                        </ul>
<<<<<<< HEAD
                        @if(session('role') <5)
                        {!! link_to_route('amap_change_data','Changer vos informations de compte',array(),array('class'=>'waves-effect waves-light btn')) !!}
                        @endif     
       </div>
=======
                        {!! link_to_route('amap_change_data','Changer ses informations',array(),array('class'=>'waves-effect waves-light btn')) !!}
                        @endif
            </div>
>>>>>>> 5c87fd74d8b7c3a57a1c2277089da52899b50ef4
        </div>

@endsection