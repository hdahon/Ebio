<?php

namespace App\Http\Controllers\ReferentPlus\Produit;

use App\Produit;
use App\User;
use App\Categorie;
use App\Periodicite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProduitController extends Controller
{


/*Affiche le formulaire d'ajout d'un produit */

       public function getCreate(Request $request)
       {             
            $categories = Categorie::all();
            $data = array('categories' => $categories);
            return view('ReferentPlus/Produit/newProduit',$data);

        }
/*
  ajout d'un nouveau produit dans la BD
*/
    public function postCreate(Request $request)
    {
            $nomProduit=$request->input('nom');
            $unite =$request->input('unite');
            $prix =$request->input('prix');
            $categorie = $request->input('categorie');
            
            Produit::create(array(
                'nomProduit' =>$nomProduit,
                'categorie_id' =>$categorie,
                'unite' =>$unite,
                'prix' =>$prix,
            ));

           return redirect('liste-produit');

    }

        /* Liste de tous les produits */
     public function getAllProduits(){
         $produits = Produit::all();
         $categories="";
         $referents="";
         $producteurs="";
         $periodicites="";  
         foreach ($produits as $produit) {
            $categories[$produit->id]=Categorie::find($produit->categorie_id);
            $referents[$produit->id]=User::find($categories[$produit->id]->referent_id);
            $producteurs[$produit->id]=User::find($categories[$produit->id]->producteur_id);
            $periodicites[$produit->id]=Periodicite::find($categories[$produit->id]->periodicite_id);
         }
         $data = array('produits' => $produits,
                        'categories'=>$categories,
                        'producteurs'=>$producteurs,
                        'referents'=>$referents,
                        'periodicites'=>$periodicites);
         return view('ReferentPlus/Produit/produit',$data);
     }


/* Afficher le detail d'un produit */
     public function getProduit($id){
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
         return view('ReferentPlus/Produit/produit-details',$data);
     }

        /* afficher le formulaire de modification d'un produit*/
         public function getFormModifierProduit($id){

         $produit= Produit::find($id);
         $categories = Categorie::all()  ;
         $data = array('categories' => $categories,
                        'produit'=>$produit,
                        
                       );
         return view('ReferentPlus/Produit/FormModifProduit',$data);
     }

     /*
Modifier une categorie catégorie dans la Bd
*/
public function postModifierProduit(Request $request,$id)
    {
            $nomProduit=$request->input('nomProduit');
            $categorie =$request->input('categorie');
            $unite =$request->input('unite');
            $prix=$request->input('prix');
            $produit=Produit::find($id);
            $produit->nomProduit=$nomProduit;
            $produit->categorie_id=$categorie;
            $produit->unite=$unite;
            $produit->prix=$prix;
            $produit->save();

           return redirect('liste-produit');

    }

   /* Supprimer une categorie catégorie dans la Bd
*/
public function postSupprimerProduit($id)
    {
       Produit::destroy($id);
       return redirect('liste-produit');
           

    }



}