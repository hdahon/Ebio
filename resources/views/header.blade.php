<?php  

    if(Session::has('role') and !Auth::guest()){
        $niveau = session('role');
    } else {
        $niveau = 0;
    }

?>

<ul id="acces" class="dropdown-content">
@if (!$niveau)
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="divider"></li>
            <li><a href="{{ url('auth/login') }}">Login</a></li>
            <li><a href="{{ url('auth/register') }}">Register</a></li>
@else 
<li><a href="{{ url('/') }}">Home</a></li>
@endif
</ul>

<ul id="action_produit" class="dropdown-content">
        @if($niveau)
            <li><a href="{{ url('liste-produit') }}">Liste des produits</a></li>
            <li><a href="{{ url('liste-categorie') }}">Liste des Catégorie</a></li>
        @endif
        @if($niveau >=3)
            <li><a href="{{ url('create-produit') }}">Ajouter un produit</a></li> 
            <li class="divider"></li> <!-- Categorie à marquer --> 
            
            <li><a href="{{ url('create-categorie') }}">Ajouter une catégorie</a></li>
        @endif
</ul>

<ul id="action_user" class="dropdown-content">
    @if($niveau)
    <li><a href="{{ url('referent/adherant') }}">Liste des utilisateurs</a></li>
    @endif
    @if($niveau >= 3)
    <li><a href="{{ url('referent/adherant') }}">Ajouter un utilisateur</a></li>
    @endif
</ul>

<ul id="action_contrat" class="dropdown-content">
    @if ($niveau >= 3)
    <li><a href="{{ url('liste-contrat') }}">Liste des contats</a></li>
    <li><a href="{{ url('create-contrat') }}">Ajouter un contrat</a></li>
    @endif  
    @if ($niveau)
    <!-- Contrat de l'utilisateur courant -->
    <li>{!! link_to_route('getSesContrats','Vos Contrats', array(Auth::user()->id)) !!}</li>
    @endif
</ul>

<ul id="action_livraison" class="dropdown-content">
    @if ($niveau)
    <li>Report</li>
    <li> {!! link_to_action('Producteur\Livraison\LivraisonController@getLivraisonsAmap','Vos Livraisons',array(Auth::user()->id)) !!}</li>
    @endif
    @if($niveau == 2)
    <li> {!! link_to_action('Producteur\Livraison\LivraisonController@getLivraisonsProducteur','Livraison(s)',array(Auth::user()->id)) !!}</li>
    @endif
</ul>

<ul id="action_argent" class="dropdown-content">
    @if ($niveau >= 3)
    <li><a href="{{ url('liste-paiement') }}">Historique</a></li>
    <li><a href="{{ url('create-paiement') }}">Ajouter un paiement</a></li> 
    @endif  
</ul>

<nav>
    <div class="nav-wrapper light-green accent-3">
        <a href="#" class="brand-logo">Amap de Garbejaire</a>
        <ul class="right hide-on-med-and-down">
        <li><a href="{{ url('dashboard/home') }}"><pan class="accueil">Accueil</pan></a></li>
        
        @if($niveau)

            <li><a href="{{ url('referent/adherant') }}">Liste Amapien</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="action_argent">Paiements<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" href="#!" data-activates="action_livraison">Livraisons<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" href="#!" data-activates="action_contrat">Contrats<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" href="#!" data-activates="action_produit">Produits<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" href="#!" data-activates="action_user">Utilisateurs<i class="material-icons right">arrow_drop_down</i></a></li>
        
        @endif

        <li><a class="dropdown-button" href="#!" data-activates="acces">Compte<i class="material-icons right">arrow_drop_down</i></a></li>
   	    </ul>
    </div>
</nav>