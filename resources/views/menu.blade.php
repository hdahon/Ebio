
    <div class="panel-heading collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav ">
            <li><a href="{{ url('dashboard/home') }}"><pan class="accueil">Accueil</pan></a></li>
            <li class="dropdown">
            	<a  data-toggle="dropdown" class="dropdown-toggle" href="">Produits<b class="caret"></b></a>
            	<ul class="dropdown-menu">
                            <li><a href="{{ url('produit/list') }}">Liste des produits</a></li>
                            <li><a href="{{ url('produit/create') }}">Ajouter un produit</a></li>	
                </ul>
            </li>
            <li><a href="{{ url('referent/adherant') }}">Adhérant</a></li>
            <li><a href="{{ url('referent/contrat') }}">Contrats</a></li>
            <li><a href="{{ url('referent/cheque') }}">Cheques</a></li>
        </ul>

    </div>