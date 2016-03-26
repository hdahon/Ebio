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




  // ----- create  affichage du formulaire----- 
  public function getchoixdate(Request $request,$id)
  {   
    
    $contratClient=ContratClient::find($id);
    $contrats = Contrat::find($contratClient->contrat_id);
    $amapiens=User::find($contratClient->amapien_id);
    $categorie=Categorie::find($contrats->categorie_id);
    $periodicite=Periodicite::find($contratClient->periodicite_id);
    $produits=Produit::where("categorie_id",$categorie->id)->get();
    if(strtolower($periodicite->libelle)==strtolower("Ponctuel")){
      $livraisons=Livraisons::All();

      foreach ($livraisons as $key => $value) {
         $debut=$value->dateLivraison;

         if($debut == date_format(date_create($contrats->debutLivraison),"Y-m-d")){
          $livraisons=$value;
          break;
         }
         //echo date_format(date_create($categorie->debutLivraison),"Y-m-d");
      }
      //echo $livraisons;
      
    }else{
      $livraisons=Livraisons::all();
    }
    $data = array(
      'contrats' => $contrats,
      'amapiens' =>$amapiens,
      'periodicite'=>$periodicite,
      'produits'=>$produits,
      'livraisons'=>$livraisons
      );
    if(session('role')==1){
      return view('amapien/panier/choixDAteLivraison',$data);
    }else{
      return view('admin/contratClient/choixDAteLivraison',$data);
    }
  }
  // ----- create  soummission du formulaire----- 
  public function postchoixdate(Request $request)
  {

    if(session('role')==1){
      $amapien =Auth::user()->id;
    }else{
      $amapien=($request->input('amapien_id'));
    }
    $produits=$request->input('produit');
    $quantites=$request->input('quantite');
    $prix=$request->input('prix');
    $liv=$request->input('livraisons');
    $periode=$request->input('periodicite_id');
    $contrat_id=$request->input('contrat_id');
    echo $amapien;
    foreach ($produits as $key=>$prod){
      $produit=$prod;
      $quantite=$quantites[$key];
      $prixx=$prix[$key];
      $livraison=$liv[$key];
      echo $livraison." ".$prixx;
      if(count($livraison)>1){
        foreach ($livraisons[$key] as $key => $value) {
          Panier::create(array(
                    'livraison_id'=>$value,
                    'user_id'=>$amapien,
                    'produit_id'=>$produit,
                    'quantite'=>$quantite,
                    'montant'=>$prixx
            ));
        }
      }else{
      Panier::create(array(
              'livraison_id'=>$livraison,
                'user_id'=>$amapien,
                'produit_id'=>$produit,
                'quantite'=>$quantite,
                'montant'=>$prixx
            ));
    }
    }
    
    return redirect('list-contratsClients');
  }


public function deletePanier($id){
         $element=Panier::find($id);
         $livraison_id=$element->livraison_id;
         $element->delete();
         return redirect('create-panier/'.$livraison_id);
  }
     
       


}