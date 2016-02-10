<?php

namespace App\Http\Controllers\Referent\Paiement;

use App\Contrat;
use App\User;
use App\Produit;
use App\Paiement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PaiementController extends Controller
{


    public function postnewPaiement(Request $request)
    {
            $referent= Auth::user()->id;

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
                'referent_id' =>$referent,
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
      $referent = Auth::user();
      $producteurs = array();
      $adherants= User::where('roleamapien_id',1)->get();
      $contrats = ContratClient::all();
      foreach($produits as $produit){
        $producteurs[$produit->producteur_id]=User::find($produit->producteur_id);  
      }
      $data = array('contrats' => $contrats,
              'adherants' =>$adherants,
              'producteurs' =>$producteurs,
                        'mois'=>$mois);
        return view('Referent/pages/cheque',$data  );

    }


public function getListPaiement(){
         $paiements = Paiement::all();
         $mois = $paiements[0]['mois'];
         foreach($paiements as $p){
            $adherant[]=User::find($p->amapien_id);

         }
         $produit =Produit::find($paiements[0]['produit_id'])->nomProduit;
         $data = array('paiements' => $paiements,
                        'mois' =>$mois,
                        'adherant' =>$adherant,
                        'produit' =>$produit);
         return view('paiement/listPaiement',$data);
     }
       


}