<?php

namespace App\Http\Controllers\Amapien;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\RoleAmapien;
use Illuminate\Support\Facades\Auth;

class AmapienController extends Controller
{
    //

	public function change(Request $request)
	{
		$data=array();
		return view('pages/amap_change_info_compte')->with($data);
	}

	public function saveData(Request $request)
	{

		$user= User::find(Auth::user()->id);

		if( null != $request->input('nom') ){
			$user->nom = $request->input('nom');
		}
		if( null != $request->input('prenom') ){
			$user->prenom = $request->input('prenom');
		}
		if( null != $request->input('mail') ){
			$user->email = $request->input('mail');
		}
		if( null != $request->input('numero') ){
			$user->numero = $request->input('numero');
		}
		if( null != $request->input('nomC') ){
			$user->nomCAdherant = $request->input('nomC');
		}
		if( null != $request->input('prenomC') ){
			$user->prenomCAdherant = $request->input('prenomC');
		}
		if( null != $request->input('numeroC') ){
			$user->numeroCAdherant = $request->input('numeroC');
		}

		$user->save();
		return view('pages/amap_change_info_compte');

	}

	public function getContrat(Request $request)
	{

	}

	public function selContrat(Request $request)
	{
		$data=array();

		return view('pages/contrat')->with($data);
	}

}
