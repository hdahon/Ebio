<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mes Livraisons<span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('list-livraisons') }}">Livraisons</a></li>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produits<span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('liste-produit') }}">Liste des produits</a></li>
        <li><a href="{{ url('liste-categorie') }}">Liste des Catégorie</a></li>
    </ul>
</li>
<li><a href="{{ url('list-users') }}">Utilisateurs</a></li>
