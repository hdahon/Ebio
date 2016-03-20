<?php

namespace App\Http\Controllers;

use App\Contrat;
use App\User;
use App\Produit;
use App\Paiement;
use App\ContratClient;
use App\Categorie;
use App\Livraisons;
use App\Panier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PanierController extends Controller
{


    public function postnewPanier(Request $request)
    {
            $produit=$request->input('produit');
            $quantite=$request->input('quantite');
            $amapien=Auth::user()->id;
            $livraison=$request->input('livraison');
            Panier::create(array(
              'livraison_id'=>$livraison,
                'user_id'=>$amapien,
                'produit_id'=>$produit,
                'quantite'=>$quantite
            ));
          return redirect('create-panier/'.$livraison);
    }

    public function getvaliderPanier(Request $request){
       return redirect('list-livraisons');
    }


 public function getnewPanier(Request $request,$id)
    {
     
      $livraison = Livraisons::find($id);
      $categorie  = Categorie::find($livraison->categorie_id);
      $produits=Produit::where('categorie_id',$categorie->id)->get();
      $lignes=Panier::where('livraison_id',$id)->get();
      if (count($lignes) == 0){
        $lignes=array();
      }
      $prods=array();
      foreach ($lignes as $key => $value) {
           $prods[$key]=Produit::find($value->produit_id);
         }
      $data = array('produits' => $produits,
                    'livraison'=>$livraison,
                    'lignes'=>$lignes,
                    'prods'=>$prods);
              
        return view('amapien/panier/newpanier',$data);

    }


public function deletePanier($id){
         $element=Panier::find($id);
         $livraison_id=$element->livraison_id;
         $element->delete();
         return redirect('create-panier/'.$livraison_id);
  }
     
       


}