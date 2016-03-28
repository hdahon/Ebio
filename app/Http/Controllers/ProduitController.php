<?php

namespace App\Http\Controllers;

use App\Produit;
use App\User;
use App\Unite;
use App\Categorie;
use App\Periodicite;
use App\Typepanier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProduitController extends Controller
{


/*Affiche le formulaire d'ajout d'un produit */

       public function getCreate(Request $request)
       {             
            $unites = Unite::all();
            $categories = Categorie::all();
            $data = array('categories' => $categories, 'unites' => $unites);
            if (session('role') ==   5){
                return view('admin/produit/newProduit',$data);
            }else if (session('role') ==   4){
                return view('referentPlus/produit/newProduit',$data);
            }else if (session('role') ==   3){
                return view('referent/produit/newProduit',$data);
            }
        }
/*
  ajout d'un nouveau produit dans la BD
*/
    public function postCreate(Request $request)
    {
            $this->validate($request, [
                'nom' => 'required',
                'unite' => 'required',
                'prix' => 'required',
                 'categorie' => 'required',  
                 ]);

            $nomProduit=$request->input('nom');
            $unite =$request->input('unite');
            $prix =$request->input('prix');
            $categorie = $request->input('categorie');
            
            Produit::create(array(
                'nomProduit' =>$nomProduit,
                'categorie_id' =>$categorie,
                'unite_id' =>$unite,
                'prix' =>$prix,
            ));

           return redirect('liste-produit');

    }

        /* Liste de tous les produits */
     public function getAllProduits(){

         $produits=array();
          $categories="";
         $referents="";
         $producteurs="";
         $periodicites="";  

         $idUser= Auth::user()->id; 
         //producteur
         if (session('role') ==   2){
           //$idUser= Auth::user()->id;
            $categories = Categorie::where('producteur_id',$idUser)->get();
            $unites=array();
            $produitP=array();
            $cat=array();
            $iter=0;
           foreach ($categories as $key => $v) {
                $produitP = Produit::where("categorie_id",$v->id)->get();
                foreach ($produitP as $key => $value) {
                    $produits[$value->id]=$value;
                    $cat[$value->id]=$v;
                    $unites[$value->id]=Unite::find($value->unite_id);
                    $typePaniers[$value->id]=Typepanier::find($v->typePanier_id);
                    $iter++;
                }
            }
            
            $products=Produit::whereIn('id',$produits)->paginate(10);   
            $data = array('produits' => $produits, 
                          'categories'=>$cat,
                          'unites'=>$unites,
                          'typePaniers'=>$typePaniers);
            return view('producteur/produit/produit',$data);
        
         //referent;
        }else if(session('role') ==   3){
            $idUser= Auth::user()->id;
            $categories = Categorie::where('referent_id',$idUser)->get();
            $unites=array();
            $produitP=array();
            $cat=array();
           foreach ($categories as $key => $v) {
                $produitP = Produit::where("categorie_id",$v->id)->get();
                foreach ($produitP as $key => $value) {
                    $produits[$key]=$value->id;
                    $cat[$key]=$v;
                }
            }
            
            $products=Produit::whereIn('id',$produits)->paginate(10);   
            $data = array('produits' => $products, 
                        'categories'=>$cat,
                        'unites'=>Unite::All(),
                        'typePaniers'=>Typepanier::All());
                 return view('referent/produit/liste_produit',$data);
        }else{
            $produits = Produit::all();
        
         foreach ($produits as $produit) {
            $cat=Categorie::find($produit->categorie_id);
            $categories[$produit->id]=$cat;
            $unites[$produit->id]=Unite::find($produit->unite_id);
            $typePaniers[$produit->id]=Typepanier::find($cat->typePanier_id);
            $referents[$produit->id]=User::find($categories[$produit->id]->referent_id);
            $producteurs[$produit->id]=User::find($categories[$produit->id]->producteur_id);
            $periodicites[$produit->id]=Periodicite::find($categories[$produit->id]->periodicite_id);
         }
     
         $data = array('produits' => $produits,
                        'categories'=>$categories,
                        'producteurs'=>$producteurs,
                        'referents'=>$referents,
                        'periodicites'=>$periodicites,
                        'unites'=>$unites,
                        'typePaniers'=>$typePaniers);
                return view('admin/produit/produit',$data);
     }
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
         if (session('role') ==   5){
                return view('admin/produit/produit-details',$data);
            }else if (session('role') ==   4){
                return view('referentPlus/produit/produit-details',$data);
            }else if (session('role') ==   3){
                return view('referent/produit/produit-details',$data);
            }else if (session('role') ==   2){
                return view('producteur/produit/produit-details',$data);
            }
     }

        /* afficher le formulaire de modification d'un produit*/
         public function getFormModifierProduit($id){

        $unites = Unite::all();
         $produit= Produit::find($id);
         $categories = Categorie::all()  ;
         $data = array('categories' => $categories,
                        'produit'=>$produit,
                        'unites'=>$unites
                       );
         if (session('role') ==   5){
                return view('admin/produit/formModifProduit',$data);
            }else if (session('role') ==   4){
                return view('referentPlus/produit/formModifProduit',$data);
            }else if (session('role') ==   3){
                return view('referent/produit/formModifProduit',$data);
            }
     }

     /*
Modifier une categorie catégorie dans la Bd
*/
public function postModifierProduit(Request $request,$id)
    {
            
             $this->validate($request, [
                'nomProduit' => 'required',
                'unite' => 'required',
                'prix' => 'required|numeric',
                 'categorie' => 'required|numeric',  
                 ]);

            $nomProduit=$request->input('nomProduit');
            $categorie =$request->input('categorie');
            $unite =$request->input('unite');
            $prix=$request->input('prix');
            $produit=Produit::find($id);
            $produit->nomProduit=$nomProduit;
            $produit->categorie_id=$categorie;
            $produit->unite_id=$unite;
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