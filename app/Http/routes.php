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
Route::get('dashboard/homeAdmin', 'Dash\DashboardController@home');


Route::get('referent/adherant/{id}', 'Adherant\AdherantController@deleteUser');
Route::get('referent/produit', 'Referent\ReferentController@produit');
Route::get('referent/adherant', 'Referent\Adherant\AdherantController@adherant');
Route::get('referent/cheque', 'Referent\ReferentController@cheque');
Route::get('referent/distribution', 'Referent\ReferentController@distribution');
Route::get('referent/report', 'Referent\ReferentController@report');


/*
------------------------Route profil admin --------------------
*/
// -- list
Route::get('list-users', 'Admin\Adherant\AdherantController@adherant');
// -- create
Route::get('create-users', 'Admin\Adherant\AdherantController@insert');
Route::post('users/new', 'Admin\Adherant\AdherantController@postUser');
// -- delete
Route::get('delete-users/{id}', 'Admin\Adherant\AdherantController@deleteUser');
// -- update
Route::get('update-users/{id}', 'Admin\Adherant\AdherantController@updateUser');
Route::post('users/update', 'Admin\Adherant\AdherantController@updateInsert');

/*
------------------------Route profil role --------------------
*/
// -- list
Route::get('list-roles', 'Admin\Role\RoleController@getAll');
// -- create
Route::get('create-roles', 'Admin\Role\RoleController@insert');
Route::post('roles/new', 'Admin\Role\RoleController@post');
// -- update
Route::get('update-roles/{id}', 'Admin\Role\RoleController@update');
Route::post('roles/update', 'Admin\Role\RoleController@updateInsert');
// -- delete
Route::get('delete-roles/{id}', 'Admin\Role\RoleController@delete');

/*
------------------------Route profil periodicite --------------------
*/
// -- list
Route::get('list-periodicites', 'Admin\Periodicite\PeriodiciteController@getAll');
// -- create
Route::get('create-periodicites', 'Admin\Periodicite\PeriodiciteController@insert');
Route::post('periodicites/new', 'Admin\Periodicite\PeriodiciteController@post');
// -- update
Route::get('update-periodicites/{id}', 'Admin\Periodicite\PeriodiciteController@update');
Route::post('periodicites/update', 'Admin\Periodicite\PeriodiciteController@updateInsert');
// -- delete
Route::get('delete-periodicites/{id}', 'Admin\Periodicite\PeriodiciteController@delete');

/*
------------------------Route profil produit --------------------
*/
// -- list
Route::get('list-produits', 'Admin\Produit\ProduitController@getAll');
// -- create
Route::get('create-produits', 'Admin\Produit\ProduitController@insert');
Route::post('produits/new', 'Admin\Produit\ProduitController@post');
// -- update
Route::get('update-produits/{id}', 'Admin\Produit\ProduitController@update');
Route::post('produits/update', 'Admin\Produit\ProduitController@updateInsert');
// -- delete
Route::get('delete-produits/{id}', 'Admin\Produit\ProduitController@delete');


/*
------------------------Route profil categories --------------------
*/
// -- list
Route::get('list-categories', 'Admin\Categorie\CategorieController@getAll');
// -- create
Route::get('create-categories', 'Admin\Categorie\CategorieController@insert');
Route::post('categories/new', 'Admin\Categorie\CategorieController@post');
// -- update
Route::get('update-categories/{id}', 'Admin\Categorie\CategorieController@update');
Route::post('categories/update', 'Admin\Categorie\CategorieController@updateInsert');
// -- delete
Route::get('delete-categories/{id}', 'Admin\Categorie\CategorieController@delete');

/*
------------------------Route profil contrats --------------------
*/
// -- list
Route::get('list-contrats', 'Admin\Contrat\ContratController@getAll');
// -- create
Route::get('create-contrats', 'Admin\Contrat\ContratController@insert');
Route::post('contrats/new', 'Admin\Contrat\ContratController@post');
// -- update
Route::get('update-contrats/{id}', 'Admin\Contrat\ContratController@update');
Route::post('contrats/update', 'Admin\Contrat\ContratController@updateInsert');
// -- delete
Route::get('delete-contrats/{id}', 'Admin\Contrat\ContratController@delete');

/*
------------------------Route profil contratsClients --------------------
*/
// -- list
Route::get('list-contratsClients', 'Admin\ContratClient\ContratClientController@getAll');
// -- create
Route::get('create-contratsClients', 'Admin\ContratClient\ContratClientController@insert');
Route::post('contratsClients/new', 'Admin\ContratClient\ContratClientController@post');
// -- update
Route::get('update-contratsClients/{id}', 'Admin\ContratClient\ContratClientController@update');
Route::post('contratsClients/update', 'Admin\ContratClient\ContratClientController@updateInsert');
// -- delete
Route::get('delete-contratsClients/{id}', 'Admin\ContratClient\ContratClientController@delete');

/*
------------------------Route profil referent --------------------
*/
Route::get('categorie-liste', 'Referent\Categorie\CategorieController@getAllCategories');
Route::get('details-categorie/{id}', 'Referent\Categorie\CategorieController@getCategorie');
Route::get('produit-liste', 'Referent\Produit\ProduitController@getAllProduits');
Route::get('details-produit/{id}', 'Referent\Produit\ProduitController@getDetailsProduit');


Route::get('adherant/update/{id}', 'Adherant\AdherantController@update');
Route::post('adherant/updateInsert', 'Adherant\AdherantController@updateInsert');
Route::get('adherant/listAdmin', 'Adherant\AdherantController@adherant');
Route::get('adherant/insert', 'Adherant\AdherantController@insert');
Route::post('adherant/postInsert', 'Adherant\AdherantController@postInsert');


Route::get('adherant/coContractant', 'Adherant\AdherantController@adherant');

Route::get('contrat/new', 'Referent\Contrat\contratController@getContrat');
Route::post('contrat/new', 'Referent\Contrat\contratController@postContrat');
Route::get('contrat/list', 'Referent\Contrat\contratController@getAllContrat');
Route::get('contrat/{id}', 'Referent\Contrat\contratController@showContrat');

/*
	Les routes pour le contrat sont les même que pour le profil referentPlus vu qu'il font 
	les même actions
*/

 
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

Route::get('produit/insert', 'Produit\ProduitController@insert');
Route::post('produit/postInsert', 'Produit\ProduitController@postInsert');
Route::post('produit/updateInsert', 'Produit\ProduitController@updateInsert');




Route::get('produit/create', 'Produit\ProduitController@getCreate');
Route::post('produit/create', 'Produit\ProduitController@postCreate');
Route::get('produit/produitAdherant/{id}', 'Produit\ProduitController@getProduitAdherant');

//producteur 
//obtient le producteur courant
get('producteur/prod/{id}',['uses'=>'Producteur\ProducteurController@prod', 'as'=>'getProd']);


//ses produits
Route::get('produit/produitProducteur/{id}','Producteur\Produit\ProduitController@getProduitAdherant');

//-- Livraisons --
Route::get('produit/LivraisonProducteur/{id}','Producteur\Livraison\LivraisonController@getLivraisonsProducteur');
Route::get('produit/deleteProduit/{id}', 'Produit\ProduitController@deleteProduit');
get('livraison/livraisons/{id}',['uses'=>'Producteur\Livraison\LivraisonController@getLivraisonsAmap','as'=>'getSesLivraisons']);

Route::get('produit/update/{id}', 'Producteur\Produit\ProduitController@update');




// -- Contrats --
/*
	Les routes pour le contrat sont les même que pour le profil referentPlus vu qu'il font 
	les même actions
*/
// Renvoie les contrats de l'amapien identifié par l'id 
get('contrats/getContratAmap/{id}',[ 'uses'=>'Amapien\Contrat\ContratController@getSesContrats', 'as'=>'getSesContrats']);



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