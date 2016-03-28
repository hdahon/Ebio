<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Livraisons;
use App\RoleAmapien;
use App\Categorie;
use App\ContratClient;
use App\Contrat;
use App\Panier;
use App\Produit;
use App;
use Barryvdh\DomPDF\Facade as PDF;

class LivraisonsController extends Controller
{

	// -- list
	public function getAll($type)
	{	
		$livraisons= array();
		$categories=array();
		$producteurs=array();
		// --Si amapien 
		if(session('role') ==1 ){
			$panierAmpaien=Panier::where("user_id",Auth::user()->id)->get()	;
			$livraisons=array();
			foreach ($panierAmpaien as $k => $value) {
				$liv=Livraisons::find($value->livraison_id);
				$dl=date_format(date_create($liv->dateLivraison),'Y/m/d');
				$t=round(((strtotime($dl))-(strtotime(date('Y/m/d',time()))))/(60*60*24));
				if($t>=0){
					$livraisons[$value->livraison_id]=$liv;
				}
					
			}

			$data = array('livraisons' => $livraisons);
			return view('amapien/livraisons/livraison',$data);

		}
		//-- Si autre profil
		else{
		$livraison= Livraisons::all();
		$livraisons=array();
		foreach ($livraison as $key => $value) {
			//$liv=$value->id;

			$dl=date_format(date_create($value->dateLivraison),'Y/m/d');
			$t=round(((strtotime($dl))-(strtotime(date('Y/m/d',time()))))/(60*60*24));
			//echo $t;
			if($t>=0){
				
				$livs[$value->id]=$value->id;
			}
		}
		if($type == 1){
			$livraisons=Livraisons::whereIn('id',$livs)->paginate(10);
	    }
	    else if($type =2 ){
	    	$livraisons=Livraisons::whereNotIn('id',$livs)->paginate(10);
	    }
		$data = array('livraisons' => $livraisons,'type'=>$type);
		if(session('role') ==3){
			return view('referent/livraisons/livraison',$data);
		else if(session('role') ==3){
			return view('producteur/livraisons/livraison',$data);
		else{
			return view('referent/livraisons/livraison',$data);
		}
	}
}/*lse{
	return redirect('auth/logout');
}
}*/
	

	// ----- create ----- 
	public function insert(Request $request)
	{             
		return view('pages/livraisons/newLivraison');
	}
	public function post(Request $request)
	{
		$debut=$request->input('debut');
		$fin=$request->input('fin');
		
		$dates=$this->getDates(date_format(date_create($debut),"d-m-Y"), date_format(date_create($fin),"d-m-Y"));
            for($i=0;$i<count($dates);$i++) {
                echo $dates[$i]['date'];
             Livraisons::create(
                array(
                        'dateLivraison'=>date("Y-m-d", strtotime($dates[$i]['date'])),
                        'semaine'=>$dates[$i]['semaine']
                ));
         }
     
		return redirect('list-livraisons/1');
	}
	
	

	// ----- editer ----- 
	public function editer($id)
	{
		$element=Livraisons::find($id);
		$categories=Categorie::all();
		$contrats=Contrat::all();
		$paniers=Panier::where("livraison_id",$element->id)->get();
		$amapiens=array();
		$catAmap=array();
		foreach ($paniers as $key => $value) {
				$prod=Produit::find($value->produit_id);
				$amapiens[$key]=User::find($value->user_id);
				//$panier[$value->user_id]=$value;
				$catAmap[$key]=Categorie::find($prod->categorie_id);
		}	
		$data=array('element'=>$element,
					'categories'=>$categories,
					'amapiens'=>$amapiens,
					'catAmapiens'=>$catAmap,
					'paniers'=>$paniers,
					'date'=>$element->dateLivraison);
		return view('pages/livraisons/fichelivraisons',$data);
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

public function imprimer($id)
{
	  $element=Livraisons::find($id);
		$categories=Categorie::all();
		$contrats=Contrat::all();
		$paniers=Panier::where("livraison_id",$element->id)->get();
		$amapiens=array();
		$catAmap=array();
		foreach ($paniers as $key => $value) {
				$prod=Produit::find($value->produit_id);
				$amapiens[$key]=User::find($value->user_id);
				//$panier[$value->user_id]=$value;
				$catAmap[$key]=Categorie::find($prod->categorie_id);
		}	
		$data=array('element'=>$element,
					'categories'=>$categories,
					'amapiens'=>$amapiens,
					'catAmapiens'=>$catAmap,
					'paniers'=>$paniers,
					'date'=>$element->dateLivraison);
	$pdf = PDF::loadView('pages/livraisons/imprimerfiche', $data)->setPaper('a4')->setOrientation('landscape');
	return  $pdf->stream();
	//$pdf->download('fiche.pdf');
}

}