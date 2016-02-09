<?php

namespace App\Http\Controllers\Referent\Produit;

use App\Produit;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProduitController extends Controller
{


    public function postCreate(Request $request)
    {
            $nomProduit=$request->input('nom');
            $typepanier =$request->input('panier');
            $typePrix =$request->input('typeprix');
            $prix =$request->input('prixunitaire');
            $periode =$request->input('periode');
            $referent=Auth::user()->id;
            $producteur = $request->input('producteur');
            Produit::create(array(
                'nomProduit' =>$nomProduit,
                'referent_id' =>$referent,
                'typePanier' =>$typepanier,
                'typeprix' =>$typePrix,
                'prix' =>$prix,
                'producteur_id' =>$producteur,
                'periodicite_id' =>$periode,
            ));

           return redirect('produit/list');

    }


       public function getCreate(Request $request)
       {             
            $referent= Auth::user()->id; 
            $producteurs = User::where('roleamapien_id',2)
            ->where('id','!=',$referent)
            ->get();
            $data = array('producteurs' => $producteurs);
            return view('Referent/Produit/newProduit',$data);

        }


     public function getAllProduits(){
         $produits = Produit::all();
         
         $data = array('name' => $produits);
         return view('Referent/Produit/produit',$data);
     }

     public function getProduitAdherant($id){

         $produits = User::find($id)->produits();
         $data = array('name' => $produits);
         return view('Referent/Produit/produitAdherant',$data);
     }



}