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


        /*Affiche le formulaire d'ajout d'une nouvelle catégorie de produit*/
         public function getCreateCategorie(Request $request)
       {             
            $ReferentPlus= Auth::user()->id; 
            $producteurs = User::where('roleamapien_id',2)
            ->where('id','!=',$ReferentPlus)
            ->get();
            $referents = User::where('roleamapien_id',3)
            ->where('id','!=',$ReferentPlus)
            ->get();
            $data = array('producteurs' => $producteurs,
                        'referents' =>$referents);
            return view('ReferentPlus/Categorie/newCategorie',$data);

        }

/*
Ajout d'une nouvelle catégorie dans la Bd
*/
public function postCreateCategorie(Request $request)
    {
            $nomProduit=$request->input('libelle');
            $typepanier =$request->input('typePanier');
            $periode =$request->input('periode');
            $Referent=$request->input('referent');
            $producteur = $request->input('producteur');
            echo $typepanier;
            Categorie::create(array(
                'libelle' =>$nomProduit,
                'typePanier' =>$typepanier,
                'referent_id' =>$Referent,
                'producteur_id' =>$producteur,
                'periodicite_id' =>$periode,
            ));

           return redirect('liste-categorie');

    }


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

        /* afficher le formulaire de modification d'une catégorie */
         public function getFormModifierCategorie($id){

         $categorie = Categorie::find($id);
         $producteurs=User::where('roleamapien_id',2)->get();
         $referents =User::where('roleamapien_id',3)->get();
         $periode=Periodicite::All();
         $periodicites=$periode;
         $data = array('categorie' => $categorie,
                        'referents'=>$referents,
                        'producteurs'=>$producteurs,
                        'periodicites'=>$periodicites,
                       );
         return view('ReferentPlus/Categorie/FormModifCategorie',$data);
     }

     /*
Modifier une categorie catégorie dans la Bd
*/
public function postModifierCategorie(Request $request,$id)
    {
            $libelle=$request->input('libelle');
            $typepanier =$request->input('typePanier');
            $periode =$request->input('periode');
            $referent=$request->input('referent');
            $producteur = $request->input('producteur');
            $categorie=Categorie::find($id);
            $categorie->libelle=$libelle;
            $categorie->typePanier=$typepanier;
            $categorie->referent_id=$referent;
            $categorie->producteur_id=$producteur;
            $categorie->periodicite_id=$periode;
            $categorie->save();

           return redirect('liste-categorie');

    }

   /* Supprimer une categorie catégorie dans la Bd
*/
public function postSupprimerCategorie($id)
    {
       Categorie::destroy($id);
       return redirect('liste-categorie');
           

    }



}