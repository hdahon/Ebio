
            <li class="dropdown">
            	<a  data-toggle="dropdown" class="dropdown-toggle" href="">Categories Produits<b class="caret"></b></a>
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
                <a  data-toggle="dropdown" class="dropdown-toggle" href="">Contrats<b class="caret"></b></a>
                <ul class="dropdown-menu">
                            <li><a href="{{ url('liste-contrat') }}">Liste des contats</a></li>
                            <li><a href="{{ url('create-contrat') }}">Ajouter un contrat</a></li>   
                </ul>
            </li>
            <li class="dropdown">
                 <a  data-toggle="dropdown" class="dropdown-toggle" href="">Cheques<b class="caret"></b></a>
                 <ul class="dropdown-menu">
                            <li><a href="{{ url('liste-paiement') }}">Historique</a></li>
                            <li><a href="{{ url('create-paiement') }}">Ajouter un paiement</a></li>   
                </ul>
            </li>
           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Livraisons<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li>Report</li>
                     <li> {!! link_to_action('Producteur\Livraison\LivraisonController@getLivraisonsAmap','Vos Livraisons',array(Auth::user()->id)) !!}</li>
                </ul>
        </li>
       