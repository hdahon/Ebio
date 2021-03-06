<?php

namespace App\Http\Controllers\Admin\Periodicite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Periodicite;
use App\RoleAmapien;

class PeriodiciteController extends Controller
{

	// -- list
	public function getAll()
	{		
		$data = array('elements' => (Periodicite::all()));
		return view('Admin/Periodicite/periodicite',$data);
	}

	// ----- create ----- 
	public function insert(Request $request)
	{             
		return view('Admin/Periodicite/newPeriodicite');
	}
	public function post(Request $request)
	{
		Periodicite::create(
			array(
				'libelle'=>($request->input('libelle'))
				));
		return redirect('list-periodicites');
	}
	
	// ----- update ----- 
	public function update($id)
	{
		$element=Periodicite::find($id);
		$data = array(
			'id' => $id, 
			'libelle' => $element->libelle
			);
		return view('Admin/Periodicite/updatePeriodicite',$data);
	}	
	public function updateInsert(Request $request)
	{
		$element=Periodicite::find($request->input('id'));
		$element->libelle=($request->input('libelle'));
		$element->save();
		return redirect('list-periodicites');
	}

	// ----- delete ----- 
	public function delete($id)
	{
		$element=Periodicite::find($id);
		$element->delete();
		return redirect('list-periodicites');
	}
}