<?php

namespace App\Http\Controllers\Produit;

use App\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProduitController extends Controller
{

    public function create(Request $request)
    {
            $nomProduit=$request->input('nom');
            $referent=Auth::user()->nom;
            $data['nom']=$nomProduit;
            $data['referent']=$referent;
            Produit::create(array(
                'nomProduit' =>$nomProduit,
                'referent_id' =>Auth::user()->id,
                'producteur_id' =>Auth::user()->id,

            ));

           return view('pages/produit',$data);

    }
     public function getAllProduits(){
         $produits = (string) Produit::find(2)->nomProduit;
         $data['nom']=$produits;
         return view('pages/produit',$data);
     }
}