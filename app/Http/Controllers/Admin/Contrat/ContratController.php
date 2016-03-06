<?php

namespace App\Http\Controllers\Admin\Contrat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Periodicite;
use App\Categorie;
use App\Contrat;
use App\RoleAmapien;

class ContratController extends Controller
{

	// -- list
	public function getAll()
	{		
		$data = array('elements' => (Contrat::all()));
		return view('Admin/Contrat/contrat',$data);
	}
	
	// ----- create ----- 
	public function insert(Request $request)
	{             
		return view('Admin/Contrat/newContrat');
	}
	public function post(Request $request)
	{
		Contrat::create(
			array(
				'titre'=>($request->input('titre')),
				'vacance'=>($request->input('vacance')),
				'categorie_id'=>($request->input('categorie_id')),
				'debutLivraison'=>($request->input('debutLivraison')),
				'dateDeFinLivraison'=>($request->input('dateDeFinLivraison'))
				));
		return redirect('list-contrats');
	}
	
	// ----- update ----- 
	public function update($id)
	{
		$element=Contrat::find($id);
		$data = array(
			'id' => $id, 
			'titre' => $element->titre,
			'vacance' => $element->vacance,
			'categorie_id' => $element->categorie_id,
			'debutLivraison' => $element->debutLivraison,
			'dateDeFinLivraison' => $element->dateDeFinLivraison
			);
		return view('Admin/Contrat/updateContrat',$data);
	}	
	public function updateInsert(Request $request)
	{
		$element=Contrat::find($request->input('id'));
		$element->titre=($request->input('titre'));
		$element->vacance=($request->input('vacance'));
		$element->categorie_id=($request->input('categorie_id'));
		$element->debutLivraison=($request->input('debutLivraison'));
		$element->dateDeFinLivraison=($request->input('dateDeFinLivraison'));
		$element->save();
		return redirect('list-contrats');
	}

	// ----- delete ----- 
	public function delete($id)
	{
		$element=Contrat::find($id);
		$element->delete();
		return redirect('list-contrats');
	}
}