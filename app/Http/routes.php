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


Route::get('/', function () {
    return view('login');
});

Route::get('admin/adherant', 'Adherant\AdherantController@adherant');

Route::get('dashboard/home', 'Dash\DashboardController@home');
<<<<<<< HEAD
/* Route pour le profil referent */
=======
Route::get('dashboard/homeAdmin', 'Dash\DashboardController@home');

Route::get('referent/adherant/{id}', 'Adherant\AdherantController@deleteUser');

>>>>>>> 62a8f61300193f2ba636b506f4fe4f85057abd26
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


Route::get('contrat/new', 'Referent\Contrat\contratController@getContrat');
Route::post('contrat/new', 'Referent\Contrat\contratController@postContrat');
Route::get('contrat/list', 'Referent\Contrat\contratController@getAllContrat');
Route::get('contrat/{id}', 'Referent\Contrat\contratController@showContrat');
 
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
/* Modèle de Contrat */
Route::get('create-contrat', 'ReferentPlus\Contrat\contratController@getContrat');
Route::post('create-contrat', 'ReferentPlus\Contrat\contratController@postContrat');
Route::get('liste-contrat', 'ReferentPlus\Contrat\contratController@getAllContrat');
Route::get('details-contrat/{id}', 'ReferentPlus\Contrat\contratController@showContrat');
Route::post('supprimer-contrat/{id}', 'ReferentPlus\Contrat\contratController@supprimerContrat');
Route::get('modifier-contrat/{id}', 'ReferentPlus\Contrat\contratController@getFormModifContrat');
Route::post('modifier-contrat/{id}', 'ReferentPlus\Contrat\contratController@postFormModifContrat');

<<<<<<< HEAD
 
Route::get('create-paiement', 'ReferentPlus\Paiement\PaiementController@getnewPaiement');
Route::get('liste-paiement', 'ReferentPlus\Paiement\PaiementController@getListPaiement');
Route::post('create-paiement', 'ReferentPlus\Paiement\PaiementController@postnewPaiement');
=======
Route::get('produit/list', 'Produit\ProduitController@getAllProduits');
Route::get('produit/listAdmin', 'Produit\ProduitController@getAllProduitsByAdmin');

Route::get('produit/create', 'Produit\ProduitController@getCreate');
Route::post('produit/create', 'Produit\ProduitController@postCreate');
Route::get('produit/produitAdherant/{id}', 'Produit\ProduitController@getProduitAdherant');
>>>>>>> 62a8f61300193f2ba636b506f4fe4f85057abd26


Route::get('produit/deleteProduit/{id}', 'Produit\ProduitController@deleteProduit');




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