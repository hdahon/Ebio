<ul id="acces" class="dropdown-content">
@if (Auth::guest())
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="divider"></li>
            <li><a href="{{ url('auth/login') }}">Login</a></li>
            <li><a href="{{ url('auth/register') }}">Register</a></li>
@else 
<li><a href="{{ url('/') }}">Home</a></li>
@endif
</ul>

<ul id="action_produit" class="dropdown-content">
            <li><a href="{{ url('produit/listAdmin') }}">Liste des produits</a></li>
            <li><a href="{{ url('produit/listAdmin') }}">Ajouter un produit</a></li>
            <li><a href="{{ url('produit/list') }}">Liste des produits</a></li>
            <li><a href="{{ url('produit/create') }}">Ajouter un produit</a></li>   	
</ul>

<ul id="action_user" class="dropdown-content">
    <li><a href="{{ url('referent/adherant') }}">Liste des utilisateurs</a></li>
    <li><a href="{{ url('referent/adherant') }}">Ajouter un utilisateur</a></li>
</ul>

<ul id="action_contrat" class="dropdown-content">
    <li><a href="{{ url('referent/contrat') }}">Contrats des Amapiens</a></li>
    @if (!Auth::guest())
    <li>{!! link_to_route('getSesContrats','Vos Contrats', array(Auth::user()->id)) !!}</li>
    @endif
</ul>

<ul id="action_livraison" class="dropdown-content">
    @if (!Auth::guest())
    <li> {!! link_to_action('Livraison\LivraisonController@getLivraisonsProducteur','Livraison(s)',array(Auth::user()->id)) !!}</li>
    <li> {!! link_to_route('getSesLivraisons','Vos Livraisons',array(Auth::user()->id)) !!}</li>
    @endif
</ul>

<ul id="action_argent" class="dropdown-content">
    <li><a href="{{ url('referent/cheque') }}">Cheques</a></li>
</ul>

<nav>
    <div class="nav-wrapper light-green accent-3">
        <a href="#" class="brand-logo">Amap de Garbejaire</a>
        <ul class="right hide-on-med-and-down">
        <li><a href="{{ url('dashboard/home') }}"><pan class="accueil">Accueil</pan></a></li>
        
        @if(!Auth::guest())

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