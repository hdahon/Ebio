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
Route::get('dashboard/homeAdmin', 'Dash\DashboardController@home');

Route::get('referent/adherant/{id}', 'Adherant\AdherantController@deleteUser');

Route::get('referent/produit', 'Referent\ReferentController@produit');
Route::get('referent/adherant', 'Adherant\AdherantController@adherant');
Route::get('referent/contrat', 'Referent\ReferentController@contrat');
Route::get('referent/cheque', 'Referent\ReferentController@cheque');

Route::get('adherant/update/{id}', 'Adherant\AdherantController@update');
Route::post('adherant/updateInsert', 'Adherant\AdherantController@updateInsert');
Route::get('adherant/listAdmin', 'Adherant\AdherantController@adherant');
Route::get('adherant/insert', 'Adherant\AdherantController@insert');
Route::post('adherant/postInsert', 'Adherant\AdherantController@postInsert');


Route::get('adherant/coContractant', 'Adherant\AdherantController@adherant');

Route::get('produit/list', 'Produit\ProduitController@getAllProduits');
Route::get('produit/listAdmin', 'Produit\ProduitController@getAllProduitsByAdmin');

Route::get('produit/insert', 'Produit\ProduitController@insert');
Route::post('produit/postInsert', 'Produit\ProduitController@postInsert');
Route::post('produit/updateInsert', 'Produit\ProduitController@updateInsert');




Route::get('produit/create', 'Produit\ProduitController@getCreate');
Route::post('produit/create', 'Produit\ProduitController@postCreate');
Route::get('produit/produitAdherant/{id}', 'Produit\ProduitController@getProduitAdherant');


Route::get('produit/deleteProduit/{id}', 'Produit\ProduitController@deleteProduit');

Route::get('produit/update/{id}', 'Produit\ProduitController@update');






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