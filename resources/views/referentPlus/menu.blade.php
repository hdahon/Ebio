
<li><a href="{{ url('list-contratsClients') }}">Contrats amapiens</a></li> 
<li class="dropdown">
    <a  data-toggle="dropdown" class="dropdown-toggle" href="">Contrats Type<b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('liste-contrat') }}">Liste des contats</a></li>
        <li><a href="{{ url('create-contrat') }}">Ajouter un contrat</a></li>  
        
    </ul>
</li>
<li class="dropdown">
    <a  data-toggle="dropdown" class="dropdown-toggle" href="">Produits<b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('liste-produit') }}">Liste des produits</a></li>
        <li><a href="{{ url('create-produit') }}">Ajouter un produit</a></li>    
    </ul>
</li>
<li class="dropdown">
   <a  data-toggle="dropdown" class="dropdown-toggle" href="">Catégories Produits<b class="caret"></b></a>
   <ul class="dropdown-menu">
        <li><a href="{{ url('liste-categorie') }}">Liste des catégories</a></li>
        <li><a href="{{ url('create-categorie') }}">Ajouter une catégorie</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Livraisons<span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('list-report') }}">Report</a></li>
        <li><a href="{{ url('list-livraisons/1') }}">Livraisons</a></li>
    </ul>
</li>
<li class="dropdown">
    <a  data-toggle="dropdown" class="dropdown-toggle" href="">Paiements<b class="caret"></b></a>
   <ul class="dropdown-menu">
        <li><a href="{{ url('liste-paiement') }}">Historique</a></li>
        <li><a href="{{ url('create-paiement') }}">Ajouter un paiement</a></li>   
    </ul>
</li>
<li><a href="{{ url('list-users') }}">Utilisateurs</a></li>
