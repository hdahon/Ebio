@extends('template')
@section('content')

<?php  

    if(Session::has('role') and Auth::check()){
        $niveau = session('role');
    } else {
        $niveau = 0;
    }

    switch ($niveau){
        case 1:{
            $role = "amapien";
            break;
        }
        case 2:{
            $role = "producteur";
            break;
        }
        case 3:{
            $role = "référent";
            break;
        }
        case 4:{
            $role = "référent plus";
            break;
        }
        case 5:{
            $role = "admin";
            break;
        }
    }

?>

        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                        <h1>Bienvenue {{$user->prenom}} {{$user->nom}} sur la page d'accueil <?php echo $role; ?></h1>
                        
                        Voici vos informations: 
                        <ul>
                        	<li><b>Nom:</b> {{$user->nom}}</li>
                        	<li><b>Prénom :</b> {{$user->prenom}}</li>
                        	<li><b>Email: </b> {{$user->email}}</li>
                        	<li><b>Téléphone: </b> {{$user->tel}}</li> 
                        	<li><b>Votre rôle au sein de l'association : </b>{{$role}} </li>
                        </ul>

                        @if(session('role') <5)
                        <h2>Voici les informations de votre conjoint: </h2>
                        <ul>
                        	<li>Nom  de votre conjoint: {{$user->nomCAdherant}}</li>
                        	<li>Prénom de votre conjoint: {{$user->prenomCAdherant}}</li>
                        	<li>Mail de votre conjoint: {{$user->emailCAdherant}}</li>
                        	<li>Numéro de téléphone de votre conjoint : {{$user->telCAdherant}}</li> 
                        </ul>
                        {!! link_to_route('amap_change_data','Changer vos informations de compte',array(),array('class'=>'waves-effect waves-light btn')) !!}
                        @endif     
       </div>
        </div>

@endsection