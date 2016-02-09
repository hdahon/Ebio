<?php

namespace App\Http\Controllers\ReferentPlus\Paiement;

use App\Contrat;
use App\User;
use App\Produit;
use App\Paiement;
use App\ContratClient;
use App\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PaiementController extends Controller
{


    public function postnewPaiement(Request $request)
    {
            $ReferentPlus= Auth::user()->id;

            $produit=$request->input('produit');
            $amapien =$request->input('amapien');
            echo $amapien;
            $producteur =$request->input('producteur');
            $mois =$request->input('mois');
            $numCheque = $request->input('numero');
            $banque=$request->input('banque');
            $titulaire=$request->input('titulaire');
            $montant = $request->input('montant');
            $cout=$request->input('cout');
            $nbPanier=$request->input('nbPanier');
            Paiement::create(array(
                'montant' =>$montant,
                'numeroCheque' =>$numCheque,
                'cout' =>$cout,
                'banque' =>$banque,
                'titulaire' =>$titulaire,
                'nbPanier' =>$nbPanier,
                'amapien_id' =>$amapien,
                'ReferentPlus_id' =>$ReferentPlus,
                'produit_id' =>$produit,
                'producteur_id' =>$producteur,
                'mois' =>$mois,

            ));
          return redirect('paiement/list');
    }



 public function getnewPaiement(Request $request)
    {
        $mois=array("janvier", "février", "mars", "avril", "mai", "juin",
        "juillet", "août", "septembre", "octobre", "novembre", "décembre");
      $ReferentPlus = Auth::user();
      $producteurs = array();
      $adherants= User::where('roleamapien_id',1)->get();
      $contrats = ContratClient::all();
      foreach($contrats as $key=>$contrat){
        $modelC=Contrat::find($contrat->contrat_id);
        $categories[$contrat->id]=Categorie::find($modelC->categorie_id);
        $amapien_id[$key]=User::find($contrat->amapien_id);
        $producteurs[$modelC->producteur_id]=User::find($modelC->producteur_id);  
      }
      $data = array('contrats' => $contrats,
              'adherants' =>$adherants,
              'producteurs' =>$producteurs,
                        'mois'=>$mois,
                        'categories'=>$categories);
        return view('ReferentPlus/pages/cheque',$data  );

    }


public function getListPaiement(){
         $paiements = Paiement::all();
         $mois="";
         $produit="";
         $adherant="";
         if(count($paiements) > 0){
            $mois = $paiements[0]['mois'];
            $produit =Produit::find($paiements[0]['produit_id'])->nomProduit;
         }
         foreach($paiements as $p){
            $adherant[]=User::find($p->amapien_id);

         }
         
         $data = array('paiements' => $paiements,
                        'mois' =>$mois,
                        'adherant' =>$adherant,
                        'produit' =>$produit);
         return view('ReferentPlus/paiement/listPaiement',$data);
     }
       


}