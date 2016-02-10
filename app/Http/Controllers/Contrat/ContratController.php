<?php

namespace App\Http\Controllers\Contrat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;


class ContratController extends Controller
{

	// Obtenir les contrats de l'utilisateur identifié par l'id
	public function getSesContrats(Request $request, int $id)
	{
		/*
		$user = User::find($id)->contratclient;
		$data = array('sesContrats'->$contrats);
		return view('')->with($data);
		//*/
		return view('pages/ses_contrats');
	}

	public function selContrat(Request $request)
	{
		return vew('pages/contrat_list_sel');
	}
}
