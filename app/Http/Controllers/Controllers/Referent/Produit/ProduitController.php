<?php

namespace App\Http\Controllers\Referent\Produit;

use App\Produit;
use App\User;
use App\Categorie;
use App\Periodicite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProduitController extends Controller
{

       /* Liste de tous les produits */
     public function getAllProduits(){
         $categories=Categorie::where('referent_id',Auth::user()->id)->get();
         //$produits[$iter] = Produit::all();
         $produit="";
         $producteurs="";
         $periodicites="";  
         $iter=0;
         foreach ($categories as $cat){
           $produits[$iter] = Produit::where("categorie_id",$cat->id)->get();
            $cats[$iter]=$cat;
            $producteurs[$cat->id]=User::find($cat->producteur_id);
            $periodicites[$cat->id]=Periodicite::find($cat->periodicite_id);
            $iter++;
         }
         
                  $data = array('produits' => $produits,
                        'categories'=>$cats,
                        'producteurs'=>$producteurs,
                        'periodicites'=>$periodicites);
         return view('Referent/Produit/liste_produit',$data);
     }

    /* Afficher le detail d'un produit */
     public function getDetailsProduit($id){
         $produit =Produit::find($id);
         $categorie = Categorie::where("id",$produit->categorie_id)->get();
         $prod=User::find($categorie[0]->producteur_id);
         $producteur=$prod->prenom.' '.$prod->nom;
         $ref=User::find($categorie[0]->referent_id);
         $referent =$ref->prenom.' '.$ref->nom;
         $periode=Periodicite::find($categorie[0]   ->periodicite_id);
         $periodicite=$periode->libelle;
         $data = array('categorie' => $categorie[0],
                        'referent'=>$referent,
                        'producteur'=>$producteur,
                        'periodicite'=>$periodicite,
                        'produit'=>$produit);
         return view('Referent/Produit/details_Produits',$data);
     }

}