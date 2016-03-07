<?php

namespace App\Http\Controllers\Referent\Categorie;

use App\Produit;
use App\User;
use App\Categorie;
use App\Periodicite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CategorieController extends Controller
{

     /*Liste des tous les categorie */
      public function getAllCategories(){
         $referent=Auth::user()->id;
         $categories = Categorie::where('referent_id',$referent)->get();
         foreach ($categories as $cat) {
            $producteurs[$cat->id]=User::find($cat->producteur_id);
            $periodicites[$cat->id]=Periodicite::find($cat->periodicite_id);
         }
         $data = array(
                        'categories'=>$categories,
                        'producteurs'=>$producteurs,
                        'periodicites'=>$periodicites);
         return view('Referent/Categorie/categorie',$data);
     }

/* Afficher le detail d'une categorie */
     public function getCategorie($id){

         $categorie = Categorie::find($id);
         $prod=User::find($categorie->producteur_id);
         $producteur=$prod->prenom.' '.$prod->nom;
         $ref=User::find($categorie->referent_id);
         $referent =$ref->prenom.' '.$ref->nom;
         $periode=Periodicite::find($categorie->periodicite_id);
         $periodicite=$periode->libelle;
         $produits =Produit::where('categorie_id',$categorie->id)
            ->get();
         $data = array('categories' => $categorie,
                        'referent'=>$referent,
                        'producteur'=>$producteur,
                        'periodicite'=>$periodicite,
                        'produits'=>$produits);
         return view('Referent/Categorie/categorie-details',$data);
     }

        



}