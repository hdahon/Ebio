<?php

namespace App\Http\Controllers\Admin\ContratClient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Periodicite;
use App\Categorie;
use App\Contrat;
use App\ContratClient; 
use App\RoleAmapien;

class ContratClientController extends Controller
{

	// -- list
	public function getAll()
	{	
		if(session('role')==1){
			$contratClients=ContratClient::where("amapien_id",Auth::user()->id);
		}else{
			$contratClients=ContratClient::all();
		}
			
		$data = array('elements' => $contratsClients);
		return view('Admin/ContratClient/contratClient',$data);
	}
	
	// ----- create ----- 
	public function insert(Request $request)
	{   
		$contrats = Contrat::all();
		$amapiens=User::where('roleamapien_id',1)->get();
		$periodicite=Periodicite::all();
		$data = array(
			 
			'contrats' => $contrats,
			'amapiens' =>$amapiens,
			'periodicites'=>$periodicite
			
			);
		if(session('role')==1){
			return view('Amapien/contrat_sel',$data);
		}else{
			return view('Admin/ContratClient/newContratClient',$data);
		}
	}

	public function post(Request $request)
	{
		if(session('role')==1){
			$amapien =Auth::user()->id;
		}else{
			$amapien=($request->input('amapien_id'));
		}
		ContratClient::create(
			array(
				'contrat_id'=>($request->input('contrat_id')),
				'amapien_id'=>$amapien,
				'periodicite_id'=>($request->input('periodicite_id'))
				));
		return redirect('list-contratsClients');
	}
	
	// ----- update ----- 
	public function update($id)
	{
		$element=ContratClient::find($id);
		$data = array(
			'id' => $id, 
			'contrat_id' => $element->contrat_id,
			'amapien_id' => $element->amapien_id,
			'periodicite_id' => $element->periodicite_id
			);
		return view('Admin/ContratClient/updateContratClient',$data);
	}	
	public function updateInsert(Request $request)
	{
		$element=ContratClient::find($request->input('id'));
		$element->contrat_id=($request->input('contrat_id'));
		$element->amapien_id=($request->input('amapien_id'));
		$element->periodicite_id=($request->input('periodicite_id'));
		$element->save();
		return redirect('list-contratsClients');
	}

	// ----- delete ----- 
	public function delete($id)
	{
		$element=ContratClient::find($id);
		$element->delete();
		return redirect('list-contratsClients');
	}
}