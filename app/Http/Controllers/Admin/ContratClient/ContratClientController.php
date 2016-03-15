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
		$contratClients=array();
		$periodicites=array();
		$amapiens=array();
		$contrats=array();
		$iter=0;
		if(session('role')==1){
			$contratClients=ContratClient::where("amapien_id",Auth::user()->id)->get();
			foreach ($contratClients as $value) {
				$contrats[$iter]=Contrat::where("id",$value->contrat_id)->get();
           		$periodicites[$iter]=Periodicite::where("id",$value->periodicite_id)->get();
           		$iter++;
         	}
         	
			$data = array('elements' => $contratClients,'periodicites'=>$periodicites,'contrats'=>$contrats);
		    return view('Amapien/listcontrat',$data);

		}else{
			$contratClients=ContratClient::all();
			foreach ($contratClients as $value) {
				$contrats[$iter]=Contrat::where("id",$value->contrat_id)->get();
           		$periodicites[$iter]=Periodicite::where("id",$value->periodicite_id)->get();
           		$amapiens[$iter] =User::where("id",$value->amapien_id)->get();
           		$iter++;
         	}
			$data = array('elements' => $contratClients,'periodicites'=>$periodicites,'amapiens'=>$amapiens, 'contrats'=>$contrats);
		    return view('Admin/ContratClient/contratClient',$data);
		}
			
		
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
		$contrats = Contrat::all();
		$amapiens=User::where('roleamapien_id',1)->get();
		$periodicite=Periodicite::all();
		$data = array(
			'id' => $id, 
			'contrat_id' => $element->contrat_id,
			'amapien_id' => $element->amapien_id,
			'periodicite_id' => $element->periodicite_id,
			'contrats' => $contrats,
			'amapiens' =>$amapiens,
			'periodicites'=>$periodicite
			);
		if(session('role')==1){
			return view('Amapien/update_contratClient',$data);
		}else{
			return view('Admin/ContratClient/updateContratClient',$data);
		}
	}	
	public function updateInsert(Request $request)
	{
		$element=ContratClient::find($request->input('id'));
		$element->contrat_id=($request->input('contrat_id'));
		if(session('role')==1){
			$element->amapien_id=Auth::user()->id;
		}else{
			$element->amapien_id=($request->input('amapien_id'));
		}
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