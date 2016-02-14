<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//home
Route::get('/', function () { return view('login'); });

//amapien 
get('amapien/changeData',['uses'=>'Amapien\AmapienController@change','as'=>'amap_change_data']);
post('amapien/save',['uses'=>'Amapien\AmapienController@saveData','as'=>'amapien_save_data']);

//admin
Route::get('admin/adherant', 'Adherant\AdherantController@adherant');

//dashboard
Route::get('dashboard/home', 'Dash\DashboardController@home');
Route::get('dashboard/homeAdmin', 'Dash\DashboardController@home');


/* Route pour le profil referent */

Route::get('referent/adherant/{id}', 'Adherant\AdherantController@deleteUser');
Route::get('referent/produit', 'Referent\ReferentController@produit');
Route::get('referent/adherant', 'Referent\Adherant\AdherantController@adherant');
Route::get('referent/cheque', 'Referent\ReferentController@cheque');
Route::get('referent/distribution', 'Referent\ReferentController@distribution');
Route::get('referent/report', 'Referent\ReferentController@report');

/*
------------------------Route profil referent --------------------
*/
Route::get('categorie-liste', 'Referent\Categorie\CategorieController@getAllCategories');
Route::get('details-categorie/{id}', 'Referent\Categorie\CategorieController@getCategorie');
Route::get('produit-liste', 'Referent\Produit\ProduitController@getAllProduits');
Route::get('details-produit/{id}', 'Referent\Produit\ProduitController@getDetailsProduit');
 
Route::get('paiement/new', 'Referent\Paiement\PaiementController@getnewPaiement');
Route::get('paiement/list', 'Referent\Paiement\PaiementController@getListPaiement');
Route::post('paiement/new', 'Referent\Paiement\PaiementController@postnewPaiement');




/*
  --------     Route profil referent plus  -------------------
*/
Route::get('ReferentPlus/produit', 'ReferentPlus\ReferentPlusController@produit');
Route::get('ReferentPlus/adherant', 'ReferentPlus\Adherant\AdherantController@adherant');
Route::get('ReferentPlus/cheque', 'ReferentPlus\ReferentPlusController@cheque');
Route::get('ReferentPlus/distribution', 'ReferentPlus\ReferentPlusController@distribution');
Route::get('ReferentPlus/report', 'ReferentPlus\ReferentPlusController@report');
/* Categories*/
Route::get('liste-categorie', 'ReferentPlus\Categorie\CategorieController@getAllCategories');
Route::get('create-categorie', 'ReferentPlus\Categorie\CategorieController@getCreateCategorie');
Route::post('create-categorie', 'ReferentPlus\Categorie\CategorieController@postCreateCategorie');
Route::get('categorie-details/{id}', 'ReferentPlus\Categorie\CategorieController@getCategorie');
Route::get('categorie-modifier/{id}', 'ReferentPlus\Categorie\CategorieController@getFormModifierCategorie');
Route::post('modifier-categorie/{id}', 'ReferentPlus\Categorie\CategorieController@postModifierCategorie');
Route::post('supprimer-categorie/{id}', 'ReferentPlus\Categorie\CategorieController@postSupprimerCategorie');

/*Produits*/
Route::get('liste-produit', 'ReferentPlus\Produit\ProduitController@getAllProduits');
Route::get('create-produit', 'ReferentPlus\Produit\ProduitController@getCreate');
Route::post('create-produit', 'ReferentPlus\Produit\ProduitController@postCreate');
Route::get('produit-details/{id}', 'ReferentPlus\Produit\ProduitController@getProduit');
Route::get('produit-modifier/{id}', 'ReferentPlus\Produit\ProduitController@getFormModifierProduit');
Route::post('produit-modifier/{id}', 'ReferentPlus\Produit\ProduitController@postModifierProduit');
Route::post('produit-supprimer/{id}', 'ReferentPlus\Produit\ProduitController@postSupprimerProduit');

/*
	Les routes pour le contrat sont les même que pour le profil referentPlus vu qu'il font 
	les même actions
*/

/* Modèle de Contrat */
Route::get('create-contrat', 'ReferentPlus\Contrat\contratController@getContrat');
Route::post('create-contrat', 'ReferentPlus\Contrat\contratController@postContrat');
Route::get('liste-contrat', 'ReferentPlus\Contrat\contratController@getAllContrat');
Route::get('details-contrat/{id}', 'ReferentPlus\Contrat\contratController@showContrat');
Route::post('supprimer-contrat/{id}', 'ReferentPlus\Contrat\contratController@supprimerContrat');
Route::get('modifier-contrat/{id}', 'ReferentPlus\Contrat\contratController@getFormModifContrat');
Route::post('modifier-contrat/{id}', 'ReferentPlus\Contrat\contratController@postFormModifContrat');

 
Route::get('create-paiement', 'ReferentPlus\Paiement\PaiementController@getnewPaiement');
Route::get('liste-paiement', 'ReferentPlus\Paiement\PaiementController@getListPaiement');
Route::post('create-paiement', 'ReferentPlus\Paiement\PaiementController@postnewPaiement');

Route::get('produit/list', 'Produit\ProduitController@getAllProduits');
Route::get('produit/listAdmin', 'Produit\ProduitController@getAllProduitsByAdmin');

Route::get('produit/create', 'Produit\ProduitController@getCreate');
Route::post('produit/create', 'Produit\ProduitController@postCreate');
Route::get('produit/produitAdherant/{id}', 'Produit\ProduitController@getProduitAdherant');

//producteur 
//obtient le producteur courant
get('producteur/prod/{id}',['uses'=>'Producteur\ProducteurController@prod', 'as'=>'getProd']);


//ses produits
Route::get('produit/produitProducteur/{id}','Produit\ProduitController@getProduitAdherant');

//ses livraisons
//Route::get('produit/LivraisonProducteur/{id}','Livraison\LivraisonController@getLivraisonsProducteur');
Route::get('produit/deleteProduit/{id}', 'Produit\ProduitController@deleteProduit');

// -- Contrats --
// Renvoie les contrats de l'amapien identifié par l'id 
get('contrats/getContratAmap/{id}',[ 'uses'=>'Contrat\ContratController@getSesContrats', 'as'=>'getSesContrats']);



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::controllers([
    'password' => 'Auth\PasswordController',
]);