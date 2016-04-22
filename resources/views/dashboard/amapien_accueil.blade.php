@extends('template')
@section('content')

<?php  


use App\User;
    $idUser= Auth::user()->id;
    $user=User::find($idUser);
    $conjointInfo=User::find($user->coadherant_id);

    $role = Auth::user()->roleamapien_id;
    if(Session::has('role') and Auth::check()){
        $niveau = session('role');
    } else {
        $niveau = 0;
    }
    /*echo $niveau;
    echo $role;*/
    switch ($role){
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
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                        <h1>Page d'acceuil <?php echo $role; ?> '</br>' Bienvenue {{$user->prenom}} {{$user->nom}} </h1>
                        
                        <h3><span class="label label-default">Vos informations</span></h3>
                        <ul>
                        	<li><b>Nom :</b> {{$user->nom}}</li>
                        	<li><b>Prénom :</b> {{$user->prenom}}</li>
                        	<li><b>Email :</b> {{$user->email}}</li>
                        	<li><b>Téléphone :</b> {{$user->tel}}</li> 
                            <li><b>Adresse :</b> {{$user->adresse}}</li> 
                            @if (($user->roleamapien_id)==2)
                            <li><b>Num siret :</b> {{$user->numSiret}}</li> 
                            @endif     
                        	<li><b>Votre rôle au sein de l'association :</b> {{$role}}</li>
                        </ul>

                        @if(session('role') <2)

                        @if (count($conjointInfo)>0)
                        <h3><span class="label label-default">Les informations de votre conjoint</span></h3>
                        <ul>
                        	<li><b>Nom :</b> {{$conjointInfo->nom}}</li>
                        	<li><b>Prénom :</b> {{$conjointInfo->prenom}}</li>
                        	<li><b>Email :</b> {{$conjointInfo->email}}</li>
                        	<li><b>Téléphone :</b> {{$conjointInfo->tel}}</li> 
                            <li><b>Adresse :</b> {{$conjointInfo->adresse}}</li> 
                            @if (($conjointInfo->roleamapien_id)==2)
                            <li><b>Num siret :</b> {{$conjointInfo->numSiret}}</li> 
                            @endif     
                        </ul>
                        @endif     
                        @endif     
                        @if(session('role') <4)
                        {!! link_to_route('amap_change_data','Changer vos informations de compte',array(),array('class'=>'waves-effect waves-light btn')) !!}
                        
                        @endif     
       </div>
        </div>
    </div></div>

@endsection
