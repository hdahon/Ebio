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

//referent
Route::get('referent/produit', 'Referent\ReferentController@produit');
Route::get('referent/adherant', 'Adherant\AdherantController@adherant');
Route::get('referent/contrat', 'Referent\ReferentController@contrat');
Route::get('referent/cheque', 'Referent\ReferentController@cheque');

//adherant
Route::get('adherant/coContractant', 'Adherant\AdherantController@adherant');

//livraisons
Route::get('livraison/livraisonProducteur/{id}','Livraison\LivraisonController@getLivraisonsProducteur');

//produit
Route::get('produit/list', 'Produit\ProduitController@getAllProduits');
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