@extends('template')
@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			@include("Admin/menu")

			<div class="panel-body">
                Bienvenue <b>{{"  ".$user->prenom." ".$user->nom}}</b>
                <br><br>
                Cette section vous permet de gérer l'ensemble des informations concernant les <b>utilisateurs</b> et les <b>produits</b> du site EBIO.<br>
                La gestion comprend les fonctionnalités suivantes :<br><br>
                - <b>lister</b> / <b>ajouter</b> / <b>modifier</b> / <b>supprimer</b> les utilisateurs et les produits<br>
                - <b>lister</b> / <b>supprimer</b> les contrats et les chèques<br>
                - <b>modifier les rôles</b> des utilisateurs<br><br>
                Bonne gestion,<br><br>
                L'équipe EBIO.
            </div>
        </div>
    </div>
</div>
@endsection