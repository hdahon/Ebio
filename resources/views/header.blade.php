<ul id="dropdown1" class="dropdown-content">
@if (Auth::guest())
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="divider"></li>
            <li><a href="{{ url('auth/login') }}">Login</a></li>
            <li><a href="{{ url('auth/register') }}">Register</a></li>
@else 
<li><a href="{{ url('/') }}">Home</a></li>
@endif
</ul>

<ul id="dropdown2" class="dropdown-content">
            <li><a href="{{ url('produit/list') }}">Liste des produits</a></li>
            <li><a href="{{ url('produit/create') }}">Ajouter un produit</a></li>	
</ul>
<nav>
    <div class="nav-wrapper light-green accent-3">
        <a href="#" class="brand-logo">Amap de Garbejaire</a>
        <ul class="right hide-on-med-and-down">
        <li><a href="{{ url('dashboard/home') }}"><pan class="accueil">Accueil</pan></a></li>
        <li><a href="{{ url('referent/adherant') }}">Liste des Amapiens</a></li>
        @if(!Auth::guest())
        <li> {!! link_to_action('Livraison\LivraisonController@getLivraisonsProducteur','Livraison(s)',array(Auth::user()->id)) !!}</li>
        <!-- <li> {!! link_to_action('Producteur\ProducteurController@prod','Ma Page',array(Auth::user()->id)) !!}</li> -->
        <!-- <li> {!! link_to_route('getProd','Ma Page',array(Auth::user()->id)) !!}</li> -->
        
        @endif
        <li><a href="{{ url('referent/contrat') }}">Contrats</a></li>
        <li><a href="{{ url('referent/cheque') }}">Cheques</a></li>
        <li><a class="dropdown-button2" href="#!" data-activates="dropdown2">Gestion Produits<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Compte<i class="material-icons right">arrow_drop_down</i></a></li>
   			</ul>
    </div>
</nav>