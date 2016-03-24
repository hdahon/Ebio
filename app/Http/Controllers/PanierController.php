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


 public function getallPanier(Request $request,$id)
    {
     
      $livraison = Livraisons::find($id);
      $userId=Auth::user()->id;
      $paniers=Panier::where("user_id",$userId)
                      ->where("livraison_id",$livraison->id)->get();
      if (count($paniers) == 0){
        $panniers=array();
      }
      $prods=array();
      $categories=array();
      $producteurs=array();
      $iter=0;
      foreach ($paniers as $key => $value) {
          if($value->livraison_id == $livraison->id){
            $p=Produit::find($value->produit_id);
            $prods[$iter]=$p;
            $cat=Categorie::find($p->categorie_id);
            $categories[$cat->id]=$cat;
            $producteurs[$iter]=User::find($cat->producteur_id);
            $iter++;
          }

         }
       
      $data = array('livraison'=>$livraison,
                    'lignes'=>$paniers,
                    'prods'=>$prods,
                    'categories'=>$categories,
                    'producteurs'=>$producteurs
                    );
              
        return view('amapien/panier/panier',$data);

    }


public function deletePanier($id){
         $element=Panier::find($id);
         $livraison_id=$element->livraison_id;
         $element->delete();
         return redirect('create-panier/'.$livraison_id);
  }
     
       


}