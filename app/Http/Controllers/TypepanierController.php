<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Typepanier;
use App\RoleAmapien;

class TypepanierController extends Controller
{

	// -- list
	public function getAll()
	{		
		$data = array('elements' => (Typepanier::all()));
		return view('admin/typepanier/typepanier',$data);
	}

	// ----- create ----- 
	public function insert(Request $request)
	{             
		return view('admin/typepanier/newTypepanier');
	}
	public function post(Request $request)
	{
		Typepanier::create(
			array(
				'libelle'=>($request->input('libelle'))
				));
		return redirect('list-typepanier');
	}
	
	// ----- update ----- 
	public function update($id)
	{
		$element=Typepanier::find($id);
		$data = array(
			'id' => $id, 
			'libelle' => $element->libelle
			);
		return view('admin/typepanier/updateTypepanier',$data);
	}	
	public function updateInsert(Request $request)
	{
		$element=Typepanier::find($request->input('id'));
		$element->libelle=($request->input('libelle'));
		$element->save();
		return redirect('list-typepanier');
	}

	// ----- delete ----- 
	public function delete($id)
	{
		$element=Typepanier::find($id);
		$element->delete();
		return redirect('list-typepanier');
	}
}