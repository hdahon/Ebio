<?php

namespace App\Http\Controllers;

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
		//$data=array();
		$idUser= Auth::user()->id;
		$user=User::find($idUser);
		$conjoint=User::find($user->coadherant_id);
		//echo $user;

		// view('amapien/amap_change_info_compte')->with($data);
		$data = array('userInfo' => ($user), 'conjointInfo' => ($conjoint));
		//return view('amapien/report/report',$data);

		return view('amapien/amap_change_info_compte',$data);
	}

	public function saveData(Request $request)
	{

		$idUser= Auth::user()->id;
		$user=User::find($idUser);

		$user->nom = $request->input('nom');
		$user->prenom = $request->input('prenom');
		$user->email = $request->input('mail');
		$user->tel = $request->input('tel');
		$user->adresse = $request->input('adresse');


		$newPassword=$request->input('newPassword');
		$newPassword2=$request->input('newPassword2');
		$chp_newMDP=$request->input('chp_newMDP');

		if ($chp_newMDP=="false"){

		}else{
			$password=bcrypt($request->input('newPassword'));
        	$user->password=$password;
		}

		if (($user->roleamapien_id)==2){
			$user->numSiret = $request->input('numSiret');
		}

		$user->save();

		$conjoint=User::find($user->coadherant_id);
		if (count($conjoint)>0){
			$conjoint->nom = $request->input('nomC');
			$conjoint->prenom = $request->input('prenomC');
			$conjoint->email = $request->input('mailC');
			$conjoint->tel = $request->input('telC');
			$conjoint->adresse = $request->input('adresseC');

			if (($conjoint->roleamapien_id)==2){
				$conjoint->numSiret = $request->input('numSiretC');
			}

			$conjoint->save();
		}
		$data = array('userInfo' => ($user), 'conjointInfo' => ($conjoint));
		return view('amapien/amap_change_info_compte',$data);

	}

	public function getContrat(Request $request)
	{

	}

	public function selContrat(Request $request)
	{
		$data=array();

		return view('amapien/contrat_sel')->with($data);
	}

}
