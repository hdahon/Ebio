
    <div class="panel-heading collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav ">
            <li><a href="{{ url('dashboard/home') }}"><pan class="accueil">Accueil</pan></a></li>
            <li class="dropdown">
            	<a  data-toggle="dropdown" class="dropdown-toggle" href="">Categories<b class="caret"></b></a>
            	<ul class="dropdown-menu">
                            <li><a href="{{ url('liste-categorie') }}">Liste des Catégorie</a></li>
                            <li><a href="{{ url('create-categorie') }}">Ajouter une catégorie</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a  data-toggle="dropdown" class="dropdown-toggle" href="">Produits<b class="caret"></b></a>
                <ul class="dropdown-menu">
                            <li><a href="{{ url('liste-produit') }}">Liste des produits</a></li>
                            <li><a href="{{ url('create-produit') }}">Ajouter un produit</a></li>    
                </ul>
            </li>
            <li><a href="{{ url('ReferentPlus/adherant') }}">Adhérant</a></li>
            <li class="dropdown">
                <a  data-toggle="dropdown" class="dropdown-toggle" href=""> Contrats<b class="caret"></b></a>
                <ul class="dropdown-menu">
                            <li><a href="{{ url('liste-contrat') }}">Modèle de contats</a></li>
                            <li><a href="{{ url('create-contrat') }}">Ajouter un modèle de contrat</a></li>   
                             <li><a  href="{{ url('contrat-amapiens') }}">Contrats amapiens</a> </li>

                 </ul>
           
            </li>
            <li class="dropdown">
                 <a  data-toggle="dropdown" class="dropdown-toggle" href="">Cheques<b class="caret"></b></a>
                 <ul class="dropdown-menu">
                            <li><a href="{{ url('liste-paiement') }}">Historique</a></li>
                            <li><a href="{{ url('create-paiement') }}">Ajouter un paiement</a></li>   
                </ul>
            <li><a href="{{ url('referent/distribution') }}">Planning</a></li>
            <li><a href="{{ url('referent/report') }}">Reports</a></li>
        </ul>

    </div>