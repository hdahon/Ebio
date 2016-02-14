<?php

namespace App\Http\Controllers\Contrat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;


class ContratController extends Controller
{

	// Obtenir les contrats de l'utilisateur identifié par l'id
	public function getSesContrats($id)
	{
		$allcontrats = User::find($id)->contratClients;
		/*
		$today = time();
		foreach($allcontrats as $contrat)
		{
			if($contrat < $today) {

			}

		}
		*/
		$data = array('sesContrats' => $contrats);
		return view('Amapien/ses_contrats')->with($data);
	}

	public function selContrat(Request $request)
	{
		return view('Amapien/contrat_list_sel');
	}

	public function historique(){
		
	}
}
