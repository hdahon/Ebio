<?php

namespace App\Http\Controllers\Producteur\Produit;

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
        $referent=Auth::user()->id;
        $producteur = $request->input('producteur');
        Produit::create(array(
            'nomProduit' =>$nomProduit,
            'referent_id' =>$referent,
            'producteur_id' =>$producteur,

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
        return view('pages/newProduit',$data);
    }

    public function postInsert(Request $request)
    {
        $nomProduit=$request->input('nom');
        Produit::create(array(
            'nomProduit' =>$nomProduit,
            'referent_id' =>4,
            'producteur_id' =>4
            ));
        return redirect('produit/listAdmin');
    }

    public function updateInsert(Request $request)
    {
        $idProduit=$request->input('idProduit');
        $nomProduit=$request->input('nom');
        $produit=Produit::find($idProduit);
        $produit->nomProduit=$nomProduit;
        $produit->save();
        return redirect('produit/listAdmin');
    }

    public function insert(Request $request)
    {             
        return view('admin/newProduit');
    }


    public function deleteProduit($id)
    {
        $user=Produit::find($id);
        $user->delete();

        return redirect('produit/listAdmin');
    }

    public function update($id){
      $produit=Produit::find($id);
       $data = array('id' => $id, 'nomProduit' => $produit->nomProduit);
        return view('admin/updateProduit',$data);
    }

    public function getAllProduits(){
       $produits = Produit::all();
       $data = array('name' => $produits);
       return view('pages/produit',$data);
   }

   public function getAllProduitsByAdmin(){
       $produits = Produit::all();
       $data = array('name' => $produits);
       return view('admin/produit',$data);
   }

   public function getProduitAdherant($id){
       $produits = User::find($id)->produits();
       $data = array('name' => $produits);
       return view('pages/produitAdherant',$data);
   }

   public function select(){
       $produits = Produit::all();
       $data = array('name' => $produits);
       return view('Produit/produit',$data);
   }
}