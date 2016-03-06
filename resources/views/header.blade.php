<?php  

    if(Session::has('role') and Auth::check()){
        $niveau = session('role');
    } else {
        $niveau = 0;
    }

?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="{{ url('dashboard/home') }}" class="navbar-brand">Amap de Garbejaire</a>
        </div>


        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accueil<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if (!$niveau)
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('auth/login') }}">Login</a></li>
                        <li><a href="{{ url('auth/register') }}">Register</a></li>
                        @else 
                        <li><a href="{{ url('dashboard/home') }}">Home</a></li>
                        <li><a href="{{url('auth/logout')}}">Se déconnecter</a></li>
                        @endif
                    </ul>
                </li>
                    @if($niveau)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Paiements<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @if ($niveau >= 3)
                                <li><a href="{{ url('liste-paiement') }}">Historique</a></li>
                                <li><a href="{{ url('create-paiement') }}">Ajouter un paiement</a></li> 
                                @endif
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Livraisons<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                    @if ($niveau)
                                    <li>Report</li>
                                    <li> {!! link_to_action('Producteur\Livraison\LivraisonController@getLivraisonsAmap','Vos Livraisons',array(Auth::user()->id)) !!}</li>
                                    @endif
                                    @if($niveau == 2)
                                    <li> {!! link_to_action('Producteur\Livraison\LivraisonController@getLivraisonsProducteur','Livraison(s)',array(Auth::user()->id)) !!}</li>
                                    @endif
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contrats<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @if ($niveau >= 3)
                                <li><a href="{{ url('liste-contrat') }}">Liste des contats</a></li>
                                <li><a href="{{ url('create-contrat') }}">Ajouter un contrat</a></li>
                                @endif  
                                @if ($niveau)
                                <!-- Contrat de l'utilisateur courant -->
                                <li>{!! link_to_route('getSesContrats','Vos Contrats', array(Auth::user()->id)) !!}</li>
                                @endif
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produits<span class="caret"></span></a>
                            <ul class="dropdown-menu">
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
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utilisateurs<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @if($niveau)
                                <li><a href="{{ url('referent/adherant') }}">Liste des utilisateurs</a></li>
                                @endif
                                @if($niveau >= 3)
                                <li><a href="{{ url('referent/adherant') }}">Ajouter un utilisateur</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                </ul>
        </div>
    </div>
</nav>