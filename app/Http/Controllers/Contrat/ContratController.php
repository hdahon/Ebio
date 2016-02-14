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
		$user = User::find($id)->contratclients;
		$data = array('sesContrats'->$contrats);
		return view('pages/ses_contrats')->with($data);
	}

	public function selContrat(Request $request)
	{
		return vew('pages/contrat_list_sel');
	}
}
