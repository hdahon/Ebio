
    <div class="panel-heading collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav ">
            <li><a href="{{ url('dashboard/home') }}"><pan class="accueil">Accueil</pan></a></li>
             <li><a href="{{ url('categorie-liste') }}">Catégories</a></li>
            <li><a href="{{ url('referent/adherant') }}">Adhérant</a></li>
            <li class="dropdown">
                <a  data-toggle="dropdown" class="dropdown-toggle" href="">Contrats</a>
                <ul class="dropdown-menu">
                            <li><a href="{{ url('contrat/list') }}">Liste des contats</a></li>
                            <li><a href="{{ url('contrat/new') }}">New</a></li>   
                </ul>
            </li>
            <li class="dropdown">
                 <a  data-toggle="dropdown" class="dropdown-toggle" href="">Cheques</a>
                 <ul class="dropdown-menu">
                            <li><a href="{{ url('paiement/list') }}">Historique</a></li>
                            <li><a href="{{ url('paiement/new') }}">New</a></li>   
                </ul>
            <li><a href="{{ url('referent/distribution') }}">Planning</a></li>
            <li><a href="{{ url('referent/report') }}">Reports</a></li>
        </ul>

    </div>