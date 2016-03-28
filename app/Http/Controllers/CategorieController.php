<?php

namespace App\Http\Controllers;

use App\Produit;
use App\User;
use App\Categorie; 
use App\Typepanier; 
use App\Periodicite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CategorieController extends Controller
{


        /*Affiche le formulaire d'ajout d'une nouvelle catégorie de produit*/
         public function getCreateCategorie(Request $request)
       {             
            $typepaniers= Typepanier::All(); 
            $ReferentPlus= Auth::user()->id; 
            $producteurs = User::where('roleamapien_id',2)
            ->where('id','!=',$ReferentPlus)
            ->get();
            $referents = User::where('roleamapien_id',3)
            ->where('id','!=',$ReferentPlus)
            ->get();
            $data = array('producteurs' => $producteurs,
                        'referents' =>$referents,
                        'typepaniers' =>$typepaniers);
            
                return view('pages/categorie/newCategorie',$data);
            

        }

/*
Ajout d'une nouvelle catégorie dans la Bd
*/
public function postCreateCategorie(Request $request)
    {
           $this->validate($request, [
                'libelle' => 'required',
                'typePanier' => 'required',
                'periode' => 'required',
                 'referent' => 'required',  
                 'producteur' => 'required', 

                 ]);

            $nomProduit=$request->input('libelle');
            $typepanier =$request->input('typePanier');
            $periode =$request->input('periode');
            $Referent=$request->input('referent');
            $producteur = $request->input('producteur');
            $periode2 =$request->input('periode2');
             $periode3 =$request->input('periode3');
             if($periode2 == ""){
            Categorie::create(array(
                'libelle' =>$nomProduit,
                'typePanier' =>$typepanier,
                'referent_id' =>$Referent,
                'producteur_id' =>$producteur,
                'periodicite_id' =>$periode,
              
            ));
        }else if($periode3 == ""){
            Categorie::create(array(
                'libelle' =>$nomProduit,
                'typePanier_id' =>$typepanier,
                'referent_id' =>$Referent,
                'producteur_id' =>$producteur,
                'periodicite_id' =>$periode,
                'periodicite2_id' =>$periode2,
                
            ));
        }else{
            Categorie::create(array(
                'libelle' =>$nomProduit,
                'typePanier_id' =>$typepanier,
                'referent_id' =>$Referent,
                'producteur_id' =>$producteur,
                'periodicite_id' =>$periode,
                'periodicite2_id' =>$periode2,
                'periodicite3_id' =>$periode3,
            ));
        }
           return redirect('liste-categorie');

    }


     /*Liste des tous les categorie */
      public function getAllCategories(){

        $idUser= Auth::user()->id; 
        //echo ($idUser);
        //echo (session('role'));
        // producteur
        if (session('role') ==   2){
            

         $categories = Categorie::where('producteur_id',$idUser)->get();
        }else if (session('role') ==   3){
            

         $categories = Categorie::where('referent_id',$idUser)->get();
        }else{
         $categories = Categorie::paginate(5);
        }

         $referents = array();
         $producteurs  = array();
         $periodicites = array();
         $periodicites2 = array();
         $periodicites3 = array();
         $iter=0;
         if(session('role') == 3){
            foreach ($categories as $cat) {
                $ref=User::find($cat->referent_id);
                //echo $cat->referent_id;
                if($cat->referent_id == Auth::user()->id){
                    //echo $cat->referent_id;
                    $referents[$cat->id]= $ref;
                    $producteurs[$cat->id]=User::find($cat->producteur_id);

                    $periodicites[$cat->id]=Periodicite::find($cat->periodicite_id);
                    if($cat->periodicites2 != ""){
                        $periodicites2[$cat->id]=Periodicite::find($cat->periodicite2_id);
                    }
                    if($cat->periodicites3 != ""){
                       $periodicites3[$cat->id]=Periodicite::find($cat->periodicite3_id);
                   }
                    $cate[$cat->id]=$cat;
                    $iter++;
                   // echo $iter;
                }   
            }
            //$categories=$cate;
            //echo count($periodicites2);
         }else{
         foreach ($categories as $cat) {
            $referents[$cat->id]=User::find($cat->referent_id);
            $producteurs[$cat->id]=User::find($cat->producteur_id);
            $periodicites[$cat->id]=Periodicite::find($cat->periodicite_id);
            $periodicites2[$cat->id]=Periodicite::find($cat->periodicite2_id);
            $periodicites3[$cat->id]=Periodicite::find($cat->periodicite3_id);
         }
        }
         $data = array(
                        'categories'=>$categories,
                        'producteurs'=>$producteurs,
                        'referents'=>$referents,
                        'periodicites'=>$periodicites,
                        'periodicites2'=>$periodicites2,
                        'periodicites3'=>$periodicites3);
           if (session('role') ==   5){
                return view('pages/categorie/listCategorie',$data);
            }else if (session('role') ==   4){
                return view('pages/categorie/listCategorie',$data);
            }
            else if (session('role') ==   3){
                return view('referent/categorie/listCategorie',$data);
            }
            else if (session('role') ==   2){
                return view('producteur/categorie/listCategorie',$data);
            }

     
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
         if (session('role') ==   5){
                return view('pages/categorie/categorie-details',$data);
        }else if (session('role') ==   4){
                return view('pages/categorie/categorie-details',$data);
        }else if (session('role') ==   2){
                return view('producteur/categorie/categorie-details',$data);
        }else{
            return view('referent/categorie/categorie-details',$data);
        }
     }

        /* afficher le formulaire de modification d'une catégorie */
         public function getFormModifierCategorie($id){

            $typepaniers= Typepanier::All(); 
         $categorie = Categorie::find($id);
         $producteurs=User::where('roleamapien_id',2)->get();
         $referents =User::where('roleamapien_id',3)->get();
         $periode1=Periodicite::find($categorie->periodicite_id);
         $periode2=Periodicite::find($categorie->periodicite2_id);
         $periode3=Periodicite::find($categorie->periodicite3_id);
         $periodicites=Periodicite::All();
         $data = array('categorie' => $categorie,
                        'referents'=>$referents,
                        'producteurs'=>$producteurs,
                        'periodicites'=>$periodicites,
                        'periode1'=>$periode1,
                        'periode2'=>$periode2,
                        'periode3'=>$periode3,
                        'typepaniers'=>$typepaniers

                       );
         
                return view('pages/categorie/formModifCategorie',$data);
        
         
     }

     /*
Modifier une categorie catégorie dans la Bd
*/
public function postModifierCategorie(Request $request,$id)
    {
            $this->validate($request, [
                'libelle' => 'required',
                'typePanier' => 'required',
                'periode' => 'required',
                 'referent' => 'required',  
                 'producteur' => 'required', 
                 
                 ]);

            $libelle=$request->input('libelle');
            $typepanier =$request->input('typePanier');
            $periode =$request->input('periode');
            $periode2 =$request->input('periode2');
            $periode3 =$request->input('periode3');
            $referent=$request->input('referent');
            $producteur = $request->input('producteur');
            $categorie=Categorie::find($id);
            $categorie->libelle=$libelle;
            $categorie->typePanier_id=$typepanier;
            $categorie->referent_id=$referent;
            $categorie->producteur_id=$producteur;
            $categorie->periodicite_id=$periode;
            if($periode2 !=""){
                $categorie->periodicite2_id=$periode2;
            }else{
                $categorie->periodicite2_id=null;
            }
            if($periode2 !=""){
                $categorie->periodicite3_id=$periode3;
            }else{
                $categorie->periodicite3_id=null;
            }
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