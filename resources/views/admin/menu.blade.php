
<li><a href="{{ url('list-users') }}">Utilisateurs</a></li>
<li><a href="{{ url('list-roles') }}">Rôles</a></li>
<li><a href="{{ url('list-periodicites') }}">Periodicité</a></li>
<li class="dropdown">
   <a  data-toggle="dropdown" class="dropdown-toggle" href="">Paiements<b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('liste-paiement') }}">Historique</a></li>
        <li><a href="{{ url('create-paiement') }}">Ajouter un paiement</a></li>   
    </ul>
</li> 
<li class="dropdown"> 
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Livraisons<span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li>Report</li>
        <li><a href="{{ url('list-livraisons') }}">Livraisons</a></li>
        <li> {!! link_to_action('Producteur\Livraison\LivraisonController@getLivraisonsAmap','Vos Livraisons',array(Auth::user()->id)) !!}</li>
    </ul>
</li>
<li class="dropdown">
    <a  data-toggle="dropdown" class="dropdown-toggle" href="">Produits<b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('liste-produit') }}">Liste des produits</a></li>
        <li><a href="{{ url('categorie-liste') }}">Listes des catégories</a></li>
        <li><a href="{{ url('create-produit') }}">Ajouter un produit</a></li> 
        <li><a href="{{ url('create-categorie') }}">Ajouter une catégorie</a></li>   
    </ul>
</li>
<li class="dropdown">

    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mes Contrats<span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('create-contratsClients') }}">Souscrire à un contrat </a></li>
        <li> <a href="{{ url('list-contratsClients') }}">Mes contrats</a></li>
    </ul>
</li>
<li class="dropdown">
    <a  data-toggle="dropdown" class="dropdown-toggle" href="">Contrats<b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('liste-contrat') }}">Modèle de contrat</a></li>
        <li><a href="{{ url('create-contrat') }}">Nouveau</a></li>   
    </ul>
</li>

