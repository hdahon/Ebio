<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Unite;
use App\RoleAmapien;

class UniteController extends Controller
{

	// -- list
	public function getAll()
	{		
		$data = array('elements' => (Unite::all()));
		return view('admin/unite/unite',$data);
	}

	// ----- create ----- 
	public function insert(Request $request)
	{             
		return view('admin/unite/newUnite');
	}
	public function post(Request $request)
	{
		Unite::create(
			array(
				'libelle'=>($request->input('libelle'))
				));
		return redirect('list-unite');
	}
	
	// ----- update ----- 
	public function update($id)
	{
		$element=Unite::find($id);
		$data = array(
			'id' => $id, 
			'libelle' => $element->libelle
			);
		return view('admin/unite/updateUnite',$data);
	}	
	public function updateInsert(Request $request)
	{
		$element=Unite::find($request->input('id'));
		$element->libelle=($request->input('libelle'));
		$element->save();
		return redirect('list-unite');
	}

	// ----- delete ----- 
	public function delete($id)
	{
		$element=Unite::find($id);
		$element->delete();
		return redirect('list-unite');
	}
}