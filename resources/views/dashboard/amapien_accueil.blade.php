@extends('template')
@section('content')

        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                        <h1>Bienvenue, {{$user->prenom}} {{$user->nom}}</h1>
                        
                        Voici vos informations: 
                        <ul>
                        	<li><b>Nom:</b> {{$user->nom}}</li>
                        	<li><b>Prénom :</b> {{$user->prenom}}</li>
                        	<li><b>Email: </b> {{$user->email}}</li>
                        	<li><b>Téléphone: </b> {{$user->tel}}</li> 
                        	<li><b>Votre rôle au sein de l'association : </b>{{$role}} </li>
                        </ul>

                        <h2>Voici les informations de votre conjoint: </h2>
                        <ul>
                        	<li>Nom  de votre conjoint: {{$user->nomCAdherant}}</li>
                        	<li>Prénom de votre conjoint: {{$user->prenomCAdherant}}</li>
                        	<li>Mail de votre conjoint: {{$user->emailCAdherant}}</li>
                        	<li>Numéro de téléphone de votre conjoint : {{$user->telCAdherant}}</li> 
                        </ul>
                        @if(session('role') <5)
                        {!! link_to_route('amap_change_data','Changer vos informations de compte',array(),array('class'=>'waves-effect waves-light btn')) !!}
                        @endif     
       </div>
        </div>

@endsection