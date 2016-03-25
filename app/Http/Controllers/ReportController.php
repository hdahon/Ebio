<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Report;
use App\RoleAmapien;
use App\ContratClient;
use App\Contrat;

class ReportController extends Controller
{

	// -- list
	public function getAll()
	{
		$data = array('elements' => (Report::all()));
		return view('amapien/report/report',$data);
	}

	// ----- create ----- 
	public function insert(Request $request)
	{             
		$idUser= Auth::user()->id;
		$contratClients=ContratClient::where("amapien_id",$idUser)->get();
		$contrats= array();
		$iter=0;
		foreach ($contratClients as $key=>$value) {
			$contrats[$key]=Contrat::where("id",$value->contrat_id)->get();
			$iter++;
		}

		$data = array('contrats'=>$contrats);
		return view('amapien/report/newReport',$data);
	}
	public function post(Request $request)
	{
		$idUser= Auth::user()->id;
		//'id','livraison_id','user_id','ancienneDateLivraison','nouvelleDateLivraison'
		Report::create(
			array(
				//'id'=>($request->input('id')),
				'livraison_id'=>($request->input('livraison_id')),
				'user_id'=>($idUser),
				'ancienneDateLivraison'=>($request->input('ancienneDateLivraison')),
				'nouvelleDateLivraison'=>($request->input('nouvelleDateLivraison'))
				));
		return redirect('list-report');
	}
	
	// ----- update ----- 
	public function update($id)
	{
		$element=Report::find($id);
		$data = array(
			'id' => $id, 
			'livraison_id'=>($element->livraison_id),
			'user_id'=>($element->input('user_id')),
			'ancienneDateLivraison'=>($element->ancienneDateLivraison),
			'nouvelleDateLivraison'=>($element->nouvelleDateLivraison)
			);
		return view('admin/report/updateReport',$data);
	}	
	public function updateInsert(Request $request)
	{
		$element=Report::find($request->input('id'));
		$element->libelle=($request->input('libelle'));
		$element->save();
		return redirect('list-report');
	}

	// ----- delete ----- 
	public function delete($id)
	{
		$element=Report::find($id);
		$element->delete();
		return redirect('list-report');
	}
}