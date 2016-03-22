<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Periodicite;
use App\Categorie;
use App\Contrat; 
use App\ContratClient; 
use App\RoleAmapien;
use App\Produit;

class ContratClientController extends Controller
{

	// -- list
	public function getAll()
	{	
		$contratClients=array();
		$periodicites=array();
		$amapiens=array();
		$contrats=array();
		$produit=array();
		$iter=0;
		if(session('role')==1){
			$contratClients=ContratClient::where("amapien_id",Auth::user()->id)->get();
			foreach ($contratClients as $value) {
				$contrats[$iter]=Contrat::where("id",$value->contrat_id)->get();
           		$periodicites[$iter]=Periodicite::where("id",$value->periodicite_id)->get();
           		$iter++;
         	}
         	
			$data = array('elements' => $contratClients,'periodicites'=>$periodicites,'contrats'=>$contrats);
		    return view('amapien/contratClient/listcontrat',$data);

		}else if(session('role')==3){
			$contratClients=ContratClient::all();
			foreach ($contratClients as $value) {
				$contrats[$iter]=Contrat::where("id",$value->contrat_id)->get();
				$categorie=Categorie::find($contrats[$iter][0]->id);
				if($categorie->referent_id == Auth::user()->id){
					$contrats[$iter]=Contrat::where("id",$value->contrat_id)->get();
					$periodicites[$iter]=Periodicite::where("id",$value->periodicite_id)->get();
           			$amapiens[$iter] =User::where("id",$value->amapien_id)->get();
           			$iter++;
				}
         	}
			$data = array('elements' => $contratClients,'periodicites'=>$periodicites,'amapiens'=>$amapiens, 'contrats'=>$contrats);
		    return view('admin/contratClient/contratClient',$data);
		}
		else if(session('role')==4 || session('role')==5 ){
			$contratClients=ContratClient::all();
			foreach ($contratClients as $value) {
				$contrats[$iter]=Contrat::where("id",$value->contrat_id)->get();
           		$periodicites[$iter]=Periodicite::where("id",$value->periodicite_id)->get();
           		$amapiens[$iter] =User::where("id",$value->amapien_id)->get();
           		$iter++;
         	}
			$data = array('elements' => $contratClients,'periodicites'=>$periodicites,'amapiens'=>$amapiens, 'contrats'=>$contrats);
		    return view('admin/contratClient/contratClient',$data);
		}		
	}
	

	// ----- create  affichage du formulaire----- 
	public function insert(Request $request,$id)
	{   
		$contrats = Contrat::find($id);
		$amapiens=User::where('roleamapien_id',1)->get();
		$categorie=Categorie::find($contrats->categorie_id);
		$periode1=Periodicite::find($categorie->periodicite_id);
		$periode2=Periodicite::find($categorie->periodicite2_id);
		$periode3=Periodicite::find($categorie->periodicite3_id);
		$periodicite=Periodicite::all();
		$produits=Produit::where("categorie_id",$categorie->id)->get();
		$data = array(
			'contrats' => $contrats,
			'amapiens' =>$amapiens,
			'periodicites'=>$periodicite,
			'periode1'=>$periode1,
			'periode2'=>$periode2,
			'periode3'=>$periode3,
			'produits'=>$produits
			);
		if(session('role')==1){
			return view('amapien/contratClient/contrat_sel',$data);
		}else{
			return view('admin/contratClient/newContratClient',$data);
		}
	}
// ----- create  soummission du formulaire----- 
	public function post(Request $request)
	{
		if(session('role')==1){
			$amapien =Auth::user()->id;
		}else{
			$amapien=($request->input('amapien_id'));
		}
		$produits=$request->input('produit');
		$quantites=$request->input('quantite');
		foreach ($produits as $prod){
			$produit=$prod;

			Panier::create(array(
              'livraison_id'=>1,
                'user_id'=>$amapien,
                'produit_id'=>$produit,
                'quantite'=>$quantite
            ));

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
			return view('amapien/update_contratClient',$data);
		}else{
			return view('admin/contratClient/updateContratClient',$data);
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

	 /* Afficher le details d'un contrat */
      public function showContrat($id)
       {        
            $TabMois=array("janvier", "février", "mars", "avril", "mai", "juin",
            "juillet", "août", "septembre", "octobre", "novembre", "décembre");
            $ReferentPlus= Auth::user()->id; 
            $contratClient = ContratClient::find($id);
            $contrat=Contrat::find($contratClient->contrat_id);
            $amapien = User::find(Auth::user()->id);
            $coadherant=User::find($amapien->coadherant_id);
            $categorie = Categorie::find($contrat->categorie_id);
            $producteur = User::find($categorie->producteur_id);
            $dL=date_create($contrat->debutLivraison);
            $dF=date_create($contrat->dateDeFinLivraison);
            $dates=$this->getDates(date_format($dL,"d-m-Y"), date_format($dF,"d-m-Y"));
            $semaineImpaire=array();
            $semainePaire =array();
            $dDebut = $TabMois[intval(explode("-",$contrat->debutLivraison)[1])-1]." ".explode("-",$contrat->debutLivraison)[0];
            $dFin =$TabMois[intval(explode("-",$contrat->dateDeFinLivraison)[1])-1]." ".explode("-",$contrat->dateDeFinLivraison)[0];
            $periode =$dDebut."-".$dFin;

            $periodicite=Periodicite::find($contratClient->periodicite_id);
            $allPeriodicite =Periodicite::all();
            for($i=0;$i<count($dates);$i++) {
                if($dates[$i]['semaine']%2 ==0 ){
                    $semainePaire[] = $dates[$i]['date'];
                }
                else{
                    $semaineImpaire[] =$dates[$i]['date'];
                }
               
              
            }
            $vacance = $contrat->vacance;
            $data = array('amapien' => $amapien,
            				'coadherant'=>$coadherant,
                            'categorie' =>$categorie,
                            'contrat' =>$contrat,
                            'producteur' =>$producteur,
                            'semaineImpaire' =>$semaineImpaire,
                             'semainePaire' =>$semainePaire,
                             'periode' =>$periode,
                             'periodicite'=>$periodicite,
                             'vacance' =>$vacance,
                             'dateDebut'=>date_format($dL,"d-m-Y"),
                             'dateFin'=>date_format($dF,"d-m-Y")
                             );
            
                return view('amapien/contratClient/showContrat',$data);

            
        }

     /** Genération des semaines paire et imapaire à partir de la date de debut et la date de 
     fin  de contrat **/
    public function getDates($dateDebut, $dateFin){
            $d=explode("-",$dateDebut);
            $f=explode("-",$dateFin);
            $jours=2;
           
            $i=mktime(0,0,0,$d[1],$d[0],$d[2]);
            $j=mktime(0,0,0,$f[1],$f[0],$f[2]);
            $pas=60*60*24;
            $fin=$i+(60*60*24*6);
            for($deb=$i; $deb<= $fin; $deb+=$pas)
            {
       
                if(date("N", $deb)==$jours)
                {
                    $premier=$deb;
                     break;
                }
            }
             $pas=60*60*24*7;
             $date=array();
            for($premier; $premier <= $j; $premier+=$pas)
            {
                //echo date("l d-m-Y", $premier)." ".date("W",$premier)."<br>";

                    $date[]= array("date" =>date(" d-m-Y", $premier),
                                  "semaine"=>date("W",$premier));
            }
            return $date;
        }

        /* Liste des tous les modèle de contrat  */
     public function getAllContratM(){
          $contrats = Contrat::all();
          $data = array('contrats' => $contrats);
          if(Auth::user()->roleamapien_id == 1){
             return view('amapien/contratClient/listContratModel',$data);
          }else{
          	return view('admin/contratClient/listContratModel',$data);
          } 
       
     }

}