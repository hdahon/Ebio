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
use App\Livraisons;
use App\Panier;

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

		foreach ($contratClients as $key=>$value) {
			$contrats[$key]=Contrat::where("id",$value->contrat_id)->get();
		}
		$data = array('contrats'=>$contrats);
		return view('amapien/report/newReport',$data);
	}
	public function post(Request $request)
	{
		$idUser= Auth::user()->id;
		//echo $idUser;

		// 1 => recuperer l'id dans la table de livraison ou dateLivraion = je ne serais pas là;
		//echo "<br>// 1 => recuperer l'id dans la table de livraison ou dateLivraion = je ne serais pas là;";
		$datePasLa=$request->input('ancienneDateLivraison');
		$elementA = Livraisons::where('dateLivraison',$datePasLa)->get();
		$idA=$elementA[0]->id;
		//echo $idA;

		// 2 => recuperer l'id dans la table de livraison ou dateLivraion = reports
		//echo "<br>// 1 => recuperer l'id dans la table de livraison ou dateLivraion = je ne serais pas là;";
		$dateReport=$request->input('nouvelleDateLivraison');
		$elementB = Livraisons::where('dateLivraison',$dateReport)->get();
		$idB=$elementB[0]->id;
		//echo $idB;

		// 3 => dans panier changer l'id (de 1) de la livraison des produits (du contrat cocher ) par l'id (de 2)
		$element=Panier::find($idA);
		$element->id=$idB;
		$element->save();

		//'id','livraison_id','user_id','ancienneDateLivraison','nouvelleDateLivraison'
		Report::create(
			array(
				//'id'=>($request->input('id')),
				//'livraison_id'=>($request->input('livraison_id')),
				'livraison_id'=>$idB,
				'user_id'=>($idUser),
				'ancienneDateLivraison'=>($request->input('ancienneDateLivraison')),
				'nouvelleDateLivraison'=>($request->input('nouvelleDateLivraison'))
				));
		return redirect('list-report');
	}
	
	// ----- update ----- 
	public function update($id)
	{
		$idUser= Auth::user()->id;
		$element=Report::find($id);
		$data = array(
			'id' => $id, 
			'livraison_id'=>($element->livraison_id),
			'user_id'=>$idUser,
			'ancienneDateLivraison'=>($element->ancienneDateLivraison),
			'nouvelleDateLivraison'=>($element->nouvelleDateLivraison)
			);
		return view('amapien/report/updateReport',$data);
	}	
	public function updateInsert(Request $request)
	{
		$element=Report::find($request->input('id'));
		$element->ancienneDateLivraison=($request->input('ancienneDateLivraison'));
		$element->nouvelleDateLivraison=($request->input('nouvelleDateLivraison'));
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