<?php

namespace App\Http\Controllers\Admin\Categorie;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Periodicite;
use App\Categorie;
use App\RoleAmapien;

class CategorieController extends Controller
{

	// -- list
	public function getAll()
	{		
		$data = array('elements' => (Categorie::all()));
		return view('Admin/Categorie/categorie',$data);
	}

	// ----- create ----- 
	public function insert(Request $request)
	{             
		return view('Admin/Categorie/newCategorie');
	}
	public function post(Request $request)
	{
		Categorie::create(
			array(
				'libelle'=>($request->input('libelle')),
				'producteur_id'=>($request->input('producteur_id')),
				'referent_id'=>($request->input('referent_id')),
				'periodicite_id'=>($request->input('periodicite_id')),
				'typePanier'=>($request->input('typePanier'))
				));
		return redirect('list-categories');
	}
	
	// ----- update ----- 
	public function update($id)
	{
		$element=Categorie::find($id);
		$data = array(
			'id' => $id, 
			'libelle' => $element->libelle,
			'producteur_id' => $element->producteur_id,
			'referent_id' => $element->referent_id,
			'periodicite_id' => $element->periodicite_id,
			'typePanier' => $element->typePanier
			);
		return view('Admin/Categorie/updateCategorie',$data);
	}	
	public function updateInsert(Request $request)
	{
		$element=Categorie::find($request->input('id'));
		$element->libelle=($request->input('libelle'));
		$element->producteur_id=($request->input('producteur_id'));
		$element->referent_id=($request->input('referent_id'));
		$element->periodicite_id=($request->input('periodicite_id'));
		$element->typePanier=($request->input('typePanier'));
		$element->save();
		return redirect('list-categories');
	}

	// ----- delete ----- 
	public function delete($id)
	{
		$element=Categorie::find($id);
		$element->delete();
		return redirect('list-categories');
	}
}