<?php

namespace App\Http\Controllers\Adherant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\RoleAmapien;
        //$role = Auth::user()->roleAmapien;
$role = Auth::user()->roleamapien_id;
        //echo $role;
$niveau = RoleAmapien::find($role)->niveau;
//echo $niveau;
?>

<div class="panel-heading collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav ">
    <?php
    /*
    if ($niveau ==   5){
        ?>
        <li><a href="{{ url('dashboard/homeAdmin') }}"><pan class="accueil">Accueil</pan></a></li>
        <li class="dropdown">
            <a  data-toggle="dropdown" class="dropdown-toggle" href="">Utilisateurs<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{ url('referent/adherant') }}">Liste des utilisateurs</a></li>
                <li><a href="{{ url('adherant/insert') }}">Ajouter un utilisateur</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a  data-toggle="dropdown" class="dropdown-toggle" href="">Produits<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{ url('produit/listAdmin') }}">Liste des produits</a></li>
                <li><a href="{{ url('produit/insert') }}">Ajouter un produit</a></li>   
            </ul>
        </li>
        <li class="dropdown">
            <a  data-toggle="dropdown" class="dropdown-toggle" href="">Contrats<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{ url('contrat/listAdmin') }}">Liste des contrats</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a  data-toggle="dropdown" class="dropdown-toggle" href="">Chèques<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{ url('cheque/listAdmin') }}">Liste des chèques</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a  data-toggle="dropdown" class="dropdown-toggle" href="">Reports<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{ url('report/listAdmin') }}">Liste des reports</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a  data-toggle="dropdown" class="dropdown-toggle" href="">Livraisons<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{ url('livraison/listAdmin') }}">Liste des livraisons</a></li>
            </ul>
        </li>
        <?php
    }else{

        */?>
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

    <?php
//}
?>

</ul>
</div>