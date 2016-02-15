<?php

namespace App\Http\Controllers\Amapien\Contrat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;



class ContratController extends Controller
{

	// Utiliser la fonction de Hassatou
	public function getSesContrats($id)
	{
		// récupérer les contrats à jour
		$allcontrats = User::find($id)->contratClients;
		$data = array('sesContrats' => $contrats);
		return view('Amapien/ses_contrats')->with($data);
	}

	public function showContrat($id){

	}

	public function selContrat(Request $request)
	{
		return view('Amapien/contrat_list_sel');
	}

	//
	public function historique(){
	}

} 
