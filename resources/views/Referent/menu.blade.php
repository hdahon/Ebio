<li class="dropdown">
    <a  data-toggle="dropdown" class="dropdown-toggle" href="">Contrats<b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('liste-contrat') }}">Modèle de contrat</a></li>
        <li><a href="{{ url('create-contrat') }}">Nouveau</a></li>   
    </ul>
</li>
<li class="dropdown">
    <a  data-toggle="dropdown" class="dropdown-toggle" href="">Produits<b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('liste-produit') }}">Liste des produits</a></li>
        <li><a href="{{ url('categorie-liste') }}">Listes des catégories</a></li>
        <li><a href="{{ url('create-produit') }}">Ajouter un produit</a></li>    
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Livraisons<span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li>Report</li>
        <li> {!! link_to_action('Producteur\Livraison\LivraisonController@getLivraisonsAmap','Vos Livraisons',array(Auth::user()->id)) !!}</li>
    </ul>
</li>
<li class="dropdown">
   <a  data-toggle="dropdown" class="dropdown-toggle" href="">Paiements<b class="caret"></b></a>
   <ul class="dropdown-menu">
        <li><a href="{{ url('liste-paiement') }}">Historique</a></li>
        <li><a href="{{ url('create-paiement') }}">Ajouter un paiement</a></li>   
    </ul>
</li>
<!--li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utilisateurs<span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('referent/adherant') }}">Liste des utilisateurs</a></li>
    </ul>
</li-->


