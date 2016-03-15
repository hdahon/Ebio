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
               <!-- MENUE AMAPIEN  --> 
                    @if($niveau == 1)
                    <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mes Contrats<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('create-contratsClients') }}">Souscrire à un contrat </a></li>
                                    <li> <a href="{{ url('list-contratsClients') }}">Mes contrats</a></li>
                                </ul>
                    </li>

                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mes Livraisons<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                    <li>Mes Reports</li>
                                    <li> {!! link_to_action('Producteur\Livraison\LivraisonController@getLivraisonsAmap','Mes Livraisons',array(Auth::user()->id)) !!}</li>
                           </ul>
                    </li>
                    <li class="dropdown">

                        <a  href="">Mes Paiements</a>
                   </li> 
                          
                    @endif
                    <!-- MENUE PRODUCTEUR -->
                    @if($niveau == 2)
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Livraisons<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                   
                                    <li>Report</li>
                                    <li> {!! link_to_action('Producteur\Livraison\LivraisonController@getLivraisonsAmap','Vos Livraisons',array(Auth::user()->id)) !!}</li>
                                    <li> {!! link_to_action('Producteur\Livraison\LivraisonController@getLivraisonsProducteur','Livraison(s)',array(Auth::user()->id)) !!}</li>
                                   
                            </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produits<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                    <li><a href="{{ url('liste-produit') }}">Liste des produits</a></li>
                                    <li><a href="{{ url('liste-categorie') }}">Liste des Catégorie</a></li>
                            </ul>
                    </li>
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utilisateurs<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('referent/adherant') }}">Liste des utilisateurs</a></li>
                            </ul>
                        </li>
                    @endif
                    <!-- MENUE REFERENT -->
                    @if($niveau == 3)
                    @include("Referent/menu")
                    @endif
                    <!-- MENUE REFERENT PLUS -->
                    @if($niveau == 4)
                    @include("ReferentPlus/menu")
                    @endif
                <!-- MENUE ADMIN -->
                    @if($niveau == 5)
                         @include("Admin/menu")
                    @endif
                </ul>
        </div>
    </div>
</nav>