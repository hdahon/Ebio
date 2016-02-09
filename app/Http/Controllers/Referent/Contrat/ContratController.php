<?php

namespace App\Http\Controllers\Referent\Contrat;

use App\Contrat;
use App\User;
use App\Produit;
use App\Periodicite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ContratController extends Controller
{


    public function postContrat(Request $request)
    {
            
            $amapien= Auth::user()->id;
            $produit=$request->input('produit');
            $titre=Produit::find($produit);
            $titres =$titre->nomProduit;
            $dateDebut=  date("Y-m-d", strtotime($request->input('dateDebut')));          
            $dateFin = date("Y-m-d", strtotime($request->input('dateFin')));
            $vacance = date("Y-m-d", strtotime($request->input('vacance')));
            Contrat::create(array(
                'titre' =>$titres,
                'amapien_id' =>$amapien,
                'produit_id' =>$produit,
                'debutLivraison' =>$dateDebut,
                'dateDeFinLivraison' =>$dateFin,
                'vacance' =>$vacance,
            ));
          return redirect('contrat/list');
    }


       public function getContrat(Request $request)
       {             
            $referent= Auth::user()->id; 
            $amapiens = User::where('roleamapien_id',1)
            ->get();
            $produits = Produit::where('referent_id',$referent)
            ->get();
            $data = array('amapiens' => $amapiens,
                          'produits' =>$produits);
            return view('Referent/contrat/newContrat',$data);
        }

      public function showContrat($id)
       {        
            $TabMois=array("janvier", "février", "mars", "avril", "mai", "juin",
            "juillet", "août", "septembre", "octobre", "novembre", "décembre");
            $referent= Auth::user()->id; 
            $contrat = Contrat::find($id);
            $amapien = array();
            $produit = Produit::find($contrat->produit_id);
            $producteur = User::find($produit->producteur_id);
            $dates=$this->getDates($contrat->debutLivraison, $contrat->dateDeFinLivraison);
            $semaineImpaire=array();
            $semainePaire =array();
            $dDebut = $TabMois[intval(explode("-",$contrat->debutLivraison)[1])-1]." ".explode("-",$contrat->debutLivraison)[0];
            $dFin =$TabMois[intval(explode("-",$contrat->dateDeFinLivraison)[1])-1]." ".explode("-",$contrat->dateDeFinLivraison)[0];
            $periode =$dDebut."-".$dFin;
            $periodicite=Periodicite::find($produit->periodicite_id);
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
                            'produit' =>$produit,
                            'contrat' =>$contrat,
                            'producteur' =>$producteur,
                            'semaineImpaire' =>$semaineImpaire,
                             'semainePaire' =>$semainePaire,
                             'periode' =>$periode,
                             'periodicite'=>$periodicite,
                             'vacance' =>$vacance,
                             );
            return view('Referent/contrat/showContrat',$data);

        }

     public function getAllContrat(){
         $contrats = Contrat::all();
         $data = array('contrats' => $contrats);
         return view('referent/contrat/listContrat',$data);
     }

     public function getProduitAdherant($id){

         $produits = User::find($id)->produits();
         $data = array('name' => $produits);
         return view('Referent/Produit/produitAdherant',$data);
     }

    public function getDates($dateDebut, $dateFin){
            $d=explode("-",$dateDebut);
            $f=explode("-",$dateFin);
            $jours=2;
           
            $i=mktime(0,0,0,$d[1],$d[2],$d[0]);
            $j=mktime(0,0,0,$f[1],$f[2],$f[0]);
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


}