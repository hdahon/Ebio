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
Route::get('/', function () { return view('Auth/login'); });
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Deconnexion routes
Route::get('deconnexion','Auth\AuthController@deconnexion');
 
Route::controllers([
    'password' => 'Auth\PasswordController',
]);

//amapien 
get('amapien/changeData',['uses'=>'AmapienController@change','as'=>'amap_change_data']);
post('amapien/save',['uses'=>'AmapienController@saveData','as'=>'amapien_save_data']);


//dashboard (Accueill)
Route::get('dashboard/home', 'Dash\DashboardController@home');

/*
------------------------Route gestion utilisateurs (amapien) --------------------
*/
// -- list
Route::get('list-users', 'AdherantController@adherant');
// -- create
Route::get('create-users', 'AdherantController@insert');
Route::post('users/new', 'AdherantController@postUser');
// -- delete
Route::get('delete-users/{id}', 'AdherantController@deleteUser');
// -- update
Route::get('update-users/{id}', 'AdherantController@updateUser');
Route::post('users/update', 'AdherantController@updateInsert');

/*
------------------------Route role --------------------
*/
// -- list
Route::get('list-roles', 'RoleController@getAll');
// -- create
Route::get('create-roles', 'RoleController@insert');
Route::post('roles/new', 'RoleController@post');
// -- update
Route::get('update-roles/{id}', 'RoleController@update');
Route::post('roles/update', 'RoleController@updateInsert');
// -- delete
Route::get('delete-roles/{id}', 'RoleController@delete');
/*
------------------------Route livraison --------------------
*/
// -- list
Route::get('list-livraisons/{type}', 'LivraisonsController@getAll');
// -- create
Route::get('create-livraisons', 'LivraisonsController@insert');
Route::post('livraisons/new', 'LivraisonsController@post');
// -- update
Route::get('update-livraisons/{id}', 'LivraisonsController@update');
Route::post('livraisons/update', 'LivraisonsController@updateInsert');
// -- delete
Route::get('delete-livraisons/{id}', 'LivraisonsController@delete');
// -- editer
Route::get('editer-livraisons/{id}', 'LivraisonsController@editer');
//-pdf
Route::get('imprimer/{id}','LivraisonsController@imprimer');

/*
------------------------Route report --------------------
*/
// -- list
Route::get('list-report', 'ReportController@getAll');
// -- create
Route::get('create-report', 'ReportController@insert');
Route::post('report/new', 'ReportController@post');
// -- update
Route::get('update-report/{id}', 'ReportController@update');
Route::post('report/update', 'ReportController@updateInsert');
// -- delete
Route::get('delete-report/{id}', 'ReportController@delete');
/*
------------------------Route unite --------------------
*/
// -- list
Route::get('list-unite', 'UniteController@getAll');
// -- create
Route::get('create-unite', 'UniteController@insert');
Route::post('unite/new', 'UniteController@post');
// -- update
Route::get('update-unite/{id}', 'UniteController@update');
Route::post('unite/update', 'UniteController@updateInsert');
// -- delete
Route::get('delete-unite/{id}', 'UniteController@delete');
/*
------------------------Route typepanier --------------------
*/
// -- list
Route::get('list-typepanier', 'TypepanierController@getAll');
// -- create
Route::get('create-typepanier', 'TypepanierController@insert');
Route::post('typepanier/new', 'TypepanierController@post');
// -- update
Route::get('update-typepanier/{id}', 'TypepanierController@update');
Route::post('typepanier/update', 'TypepanierController@updateInsert');
// -- delete
Route::get('delete-typepanier/{id}', 'TypepanierController@delete');
/*
------------------------Route periodicite --------------------
*/
// -- list
Route::get('list-periodicites', 'PeriodiciteController@getAll');
// -- create
Route::get('create-periodicites', 'PeriodiciteController@insert');
Route::post('periodicites/new', 'PeriodiciteController@post');
// -- update
Route::get('update-periodicites/{id}', 'PeriodiciteController@update');
Route::post('periodicites/update', 'PeriodiciteController@updateInsert');
// -- delete
Route::get('delete-periodicites/{id}', 'PeriodiciteController@delete');
/*
------------------------Route contratsClients  --------------------
*/
// -- list
Route::get('list-contratsClients', 'ContratClientController@getAll');
// -- create
Route::get('create-contratsClients/{id}', 'ContratClientController@insert');
Route::post('contratsClients/new', 'ContratClientController@post');
// -- update
Route::get('update-contratsClients/{id}', 'ContratClientController@update');
Route::post('contratsClients/update', 'ContratClientController@updateInsert');
// -- delete
Route::get('delete-contratsClients/{id}', 'ContratClientController@delete');
// --show
Route::get('details-contratclient/{id}', 'ContratClientController@showContrat');
// --list contat modèle
Route::get('list-contrat', 'ContratClientController@getAllContratM');



/*
------------------------Route contrats (Modèle de contrat)  --------------------
*/
// --list
Route::get('liste-contrat', 'ContratController@getAllContrat');
// --create
Route::get('create-contrat', 'ContratController@getContrat');
Route::post('create-contrat', 'ContratController@postContrat');
// --update
Route::get('modifier-contrat/{id}', 'ContratController@getFormModifContrat');
Route::post('modifier-contrat/{id}', 'ContratController@postFormModifContrat');
// --delete
Route::get('supprimer-contrat/{id}', 'ContratController@supprimerContrat');
// --show
Route::get('details-contrat/{id}', 'ContratController@showContrat');


/*
------------------------Route Catégorie de produit  --------------------
*/
// --list
Route::get('liste-categorie', 'CategorieController@getAllCategories');
// --create
Route::get('create-categorie', 'CategorieController@getCreateCategorie');
Route::post('create-categorie', 'CategorieController@postCreateCategorie');
// --update
Route::get('categorie-modifier/{id}', 'CategorieController@getFormModifierCategorie');
Route::post('modifier-categorie/{id}', 'CategorieController@postModifierCategorie');
// --delete
Route::get('supprimer-categorie/{id}', 'CategorieController@postSupprimerCategorie');
// --show
Route::get('categorie-details/{id}', 'CategorieController@getCategorie');

/*
------------------------Route  produit  --------------------
*/
// --list
Route::get('liste-produit', 'ProduitController@getAllProduits');
// --create 
Route::get('create-produit', 'ProduitController@getCreate');
Route::post('create-produit', 'ProduitController@postCreate');
// --update
Route::get('produit-modifier/{id}', 'ProduitController@getFormModifierProduit');
Route::post('produit-modifier/{id}', 'ProduitController@postModifierProduit');
// --delete
Route::get('produit-supprimer/{id}', 'ProduitController@postSupprimerProduit');
// --show
Route::get('produit-details/{id}', 'ProduitController@getProduit');

/*
	------------------- Route paiement ------------------------
*/ 
// --list
Route::get('liste-paiement', 'PaiementController@getListPaiement');	
// --create
Route::get('create-paiement', 'PaiementController@getnewPaiement');
Route::post('create-paiement', 'PaiementController@postnewPaiement');

/*
	----------------route panier----------------------- 
*/
//--create
Route::get('list-panier/{id}', 'PanierController@getAllPanier');
//--choix date de livraison
Route::get('date-livraison/{id}', 'PanierController@getchoixdate');
Route::post('date-livraison', 'PanierController@postchoixdate');
// ---delete
Route::get('delete-panier/{id}', 'PanierController@deletePanier');

/*
Route::get('produit/list', 'Produit\ProduitController@getAllProduits');
Route::get('produit/listAdmin', 'Produit\ProduitController@getAllProduitsByAdmin');
Route::get('produit/insert', 'Produit\ProduitController@insert');
Route::post('produit/postInsert', 'Produit\ProduitController@postInsert');
Route::post('produit/updateInsert', 'Produit\ProduitController@updateInsert');
Route::get('produit/create', 'Produit\ProduitController@getCreate');
Route::post('produit/create', 'Produit\ProduitController@postCreate');
Route::get('produit/produitAdherant/{id}', 'Produit\ProduitController@getProduitAdherant');
*/
// Renvoie les contrats de l'amapien identifié par l'id 
get('contrats/getContratAmap/{id}',[ 'uses'=>'Amapien\Contrat\ContratController@getSesContrats', 'as'=>'getSesContrats']);



