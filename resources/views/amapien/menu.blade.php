<li class="dropdown">
    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mes Contrats<span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('liste-contrat') }}">Souscrire à un contrat </a></li>
        <li> <a href="{{ url('list-contratsClients') }}">Mes contrats</a></li>
    </ul>
</li>

<li class="dropdown">
    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mes Livraisons<span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('list-report') }}">Report</a></li>
        <li><a href="{{ url('list-livraisons/1') }}">Livraisons</a></li>
    </ul>
</li>
<li class="dropdown">
   <a href="{{ url('liste-paiement') }}">Paiement</a>
</li> 