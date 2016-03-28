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
use App\Periodicite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PanierController extends Controller
{

public function getallPanier(Request $request,$id)
    {
     
      $livraison = Livraisons::find($id);
      $userId=Auth::user()->id;
      //si amapien
     if(session('role') == 1){
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
    else if(session('role')==2){
      $paniers=Panier::where("livraison_id",$livraison->id)->get();
      $iter=0;
      $produits=array();
      $categories=array();
      $amapiens =array();
      $panier=array();
      foreach ($paniers as $key => $value) {
          $prod=Produit::find($value->produit_id);
          $cat=Categorie::find($prod->categorie_id);
          if($cat->producteur_id == $userId){
            $produits[$iter]=$prod;
            $categories[$cat->id]=$cat;
            $amapiens[$iter]=User::find($value->user_id);
            $panier[$iter]=$value;
            $iter++;
          }
      }
        $data = array('livraison'=>$livraison,
                    'lignes'=>$panier,
                    'prods'=>$produits,
                    'categories'=>$categories,
                    'producteurs'=>$amapiens
                    );
              
        return view('producteur/livraisons/panier',$data);
    }
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
         
      }
    }else{
          $livraison=Livraisons::all();
          $dateD=date_format(date_create($contrats->debutLivraison),'Y/m/d');
          $dateF=date_format(date_create($contrats->dateDeFinLivraison),'Y/m/d');
          $vacance=date_format(date_create($contrats->vacance),'Y/m/d');
          $vacance1=date_format(date_create($contrats->vacance1),'Y/m/d');
          $vacance2=date_format(date_create($contrats->vacance2),'Y/m/d');
          $livraisons=array();
          //prendre que les date de livraion applicable au contrat
          
          foreach ($livraison as $key => $value) {
            $dl=date_format(date_create($value->dateLivraison),'Y/m/d');
            $t1= round((strtotime($dl)-strtotime($dateD))/(60*60*24));
            $t2=round((strtotime($dl)-strtotime($dateF))/(60*60*24));
            $t3=round((strtotime($dl)-strtotime($vacance))/(60*60*24));
            $t4=round((strtotime($dl)-strtotime($vacance1))/(60*60*24));
            $t5=round((strtotime($dl)-strtotime($vacance2))/(60*60*24));
            $t6=round(((strtotime($dl))-(strtotime(date('Y/m/d',time()))))/(60*60*24));
           //**/ echo $t5."  ".$t6;
            foreach ($produits as $ke => $v) {
                  $panier=Panier::where("user_id",$amapiens->id)
                              ->where('livraison_id',$value->id)
                              ->where('produit_id',$v->id)->get();
                 
                  if(count($panier) == 0){
                     if($t1>0 && $t2<0 && $t3 !=0 && $t4 !=0 && $t5 !=0 && $t6>0 ){
                         $livraisons[$key]=$value;
                         //echo $value->dateLivraison." GGG ".$panier;
                  }            

              }
            }

          }
      }

      $data = array(
      'contrats' => $contrats,
      'amapiens' =>$amapiens,
      'periodicite'=>$periodicite,
      'produits'=>$produits,
      'livraisons'=>$livraisons,
      'contratclient_id'=>$contratClient->id
      );
    if(session('role')==1){
      return view('amapien/panier/choixDateLivraison',$data);
    }else{
      return view('pages/contratClient/choixDateLivraison',$data);
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
    $livraisons=$request->input('livraisons');
    $periode=$request->input('periode');
    $contrat_id=$request->input('contratclient_id');
    $montant=0;

    echo count($livraisons)." ".$periode;
//Si ponctuel choisir les produits et quantité
    if(strtolower($periode) == strtolower("Ponctuel")){
      foreach ($produits as $key=>$prod){
        $produit=$prod;
        $quantite=$quantites[$key];
        $prixx=$prix[$key];
        $livraison=$livraisons[$key];
        $m=$quantite*$prixx;
        $montant=$montant+$m;
          Panier::create(array(
                    'livraison_id'=>$livraison,
                    'user_id'=>$amapien,
                    'produit_id'=>$produit,
                    'quantite'=>$quantite,
                    'montant'=>$prixx,
                    'contratclient_id'=>$contrat_id
          ));
        
        }
    }
    //si bi-mensuel choisir que le produit et repeter pour toutes les dates concerné
    else  if(strtolower($periode) == strtolower("Bi-Mensuel semaine paire") || strtolower($periode) == strtolower("Bi-Mensuel semaine impaire")){
         $montant=$prix*$quantites;
         $quantite=$quantites;
        foreach ($livraisons as $key => $value) {
          
          Panier::create(array(
                    'livraison_id'=>$value,
                    'user_id'=>$amapien,
                    'produit_id'=>$produits,
                    'quantite'=>$quantite,
                    'montant'=>$prix,
                    'contratclient_id'=>$contrat_id
            ));
        }
    }
    //si mensuel semaine choisir que le produit et repeter pour toutes les dates concerné
    else  if(strtolower($periode) == strtolower("Mensuel semaine paire") || strtolower($periode) == strtolower("Mensuel semaine impaire")){
         $montant=$prix*$quantites;
         $quantite=$quantites;
        foreach ($livraisons as $key => $value) {
          
          Panier::create(array(
                    'livraison_id'=>$value,
                    'user_id'=>$amapien,
                    'produit_id'=>$produits,
                    'quantite'=>$quantite,
                    'montant'=>$prix,
                    'contratclient_id'=>$contrat_id
            ));
      }
      
    }
    //si hebdomadaire choisir que le produit et repeter pour toutes les dates concernés
     else  if(strtolower($periode) == strtolower("hebdomadaire") || strtolower($periode) == strtolower("Mensuel semaine impaire")){
        $montant=$prix*$quantites;
         $quantite=$quantites;
        foreach ($livraisons as $key => $value) {
          Panier::create(array(
                    'livraison_id'=>$value,
                    'user_id'=>$amapien,
                    'produit_id'=>$produits,
                    'quantite'=>$quantite,
                    'montant'=>$prix,
                    'contratclient_id'=>$contrat_id
            ));
      }
    }





    $element=ContratClient::find($contrat_id);
    echo $element;
    $element->montantParMois= $montant;
    $element->save();

    
    
    return redirect('list-contratsClients');
  }


public function deletePanier($id){
         $element=Panier::find($id);
         $livraison_id=$element->livraison_id;
         $element->delete();
         return redirect('create-panier/'.$livraison_id);
  }
     
       


}