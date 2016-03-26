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
		//$idUser= Auth::user()->id;
		//echo "<br><br><br>$idUser<br><br><br>";
		$data = array('elements' => (Report::all()));
		return view('amapien/report/report',$data);
	}

	// ----- create ----- 
	public function insert(Request $request)
	{             
		$idUser= Auth::user()->id;
		//echo session('role');
		if (session('role')==1){
			$contratClients=ContratClient::where("amapien_id",$idUser)->get();
		}else{
			$contratClients=ContratClient::All();
		}
		$amapiens = User::where('roleamapien_id',1)->get();
		//echo json_encode($amapiens);

		$contrats= array();

		/*
		Et si l’on veut vraiment être parfait, l’amarine peut reporter jusqu’à une semaine à l’avance
		Exemple : nous sommes le 1er mars. Il peut reporter sa livraison initialement prévue le 8 mars.
		Nous sommes le 2 mars ou après : il ne peut plus reporter sa livraison du 8 mars.
		*/
		$datetime = date('Y-m-d', time()+(86400*7));

		foreach ($contratClients as $key=>$value) {
			$dateOK=count(Contrat::where("id",$value->contrat_id)->whereDate('debutLivraison', '>=',$datetime)->get());
			if ($dateOK>0){
				$contrats[$key]=Contrat::where("id",$value->contrat_id)->whereDate('debutLivraison', '>=',$datetime)->get();
			}
		}
		//echo json_encode($contrats);
		$data = array('contrats'=>$contrats, 'amapiens'=>$amapiens);
		return view('amapien/report/newReport',$data);
	}
	public function post(Request $request)
	{
		if(Auth::user()->roleamapien_id != 1){ 
			$idUser= $request->input('amapien'); 
		} else{
			$idUser= Auth::user()->id;
		}
		//echo $idUser;
		/*
		Pr récapituler (avec la nouvelle solution contrat_id ds panier), une fois que l'amapien aura coché les contrats, changer ses dates puis valider le formulaire, voici le process :
		- ds la table de livraison : je récupère l'id livraison correspondant à la nouvelle date de report
		*/

		// 2 => recuperer l'id dans la table de livraison ou dateLivraion = reports
		//echo "<br>// 1 => recuperer l'id dans la table de livraison ou dateLivraion = je ne serais pas là;";
		$dateReport=$request->input('nouvelleDateLivraison');
		//echo "dateReport $dateReport";
		$elementB = Livraisons::where('dateLivraison',$dateReport)->get();
		//echo "count : ". count($elementB)."<br>";
		if (count($elementB)>0){
			$newIdLivraison=$elementB[0]->id;
			//echo "newIdLivraison : ".$newIdLivraison."<br>";

			$choixContrats=$request->input('choixContrats');
			if (count($choixContrats)>0){
				//echo "choixContrats :<br>";
				//echo json_encode($choixContrats)."<br>";
				foreach ($choixContrats as $key => $value) {
					# code...
					//echo $value."<br>";

					$element=Panier::where("user_id",$idUser)->where("contratclient_id",$value)->get();
					if (count($element)>0){
						//echo json_encode($element);
						foreach ($element as $key => $value) {
							$panier=Panier::find($value->id);
							# code...
							//echo "valueZ : ".$panier->id;
							/*$panier=Panier::find($value[0]->id);
							//echo json_encode($element);
							//echo "element Panier: ".$element[0]->id;*/
							$panier->livraison_id=$newIdLivraison;
							$panier->save();
						}
						

						// 1 => recuperer l'id dans la table de livraison ou dateLivraion = je ne serais pas là;
						//echo "<br>// 1 => recuperer l'id dans la table de livraison ou dateLivraion = je ne serais pas là;";
						/*$datePasLa=$request->input('ancienneDateLivraison');
						echo "datePasLa $datePasLa";
						$elementA = Livraisons::where('dateLivraison',$datePasLa)->get();
						$idA=$elementA[0]->id;*/
						//echo $idA;


						// 3 => dans panier changer l'id (de 1) de la livraison des produits (du contrat cocher ) par l'id (de 2)
						
						/*$element=Panier::find($idA);
						$element->id=$idB;
						$element->save();

						*/

						//'id','livraison_id','user_id','ancienneDateLivraison','nouvelleDateLivraison'
						Report::create(
							array(
								//'id'=>($request->input('id')),
								//'livraison_id'=>($request->input('livraison_id')),
								'livraison_id'=>$newIdLivraison,
								'user_id'=>($idUser),
								'ancienneDateLivraison'=>($request->input('ancienneDateLivraison')),
								'nouvelleDateLivraison'=>($request->input('nouvelleDateLivraison'))
								));
					}
				}
			}
		}
		
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