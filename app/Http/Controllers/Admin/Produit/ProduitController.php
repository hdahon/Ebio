<?php

namespace App\Http\Controllers\Admin\Produit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Produit;


class ProduitController extends Controller
{

// -- list
  public function getAll(){
    $data = array('elements' => (Produit::all()));
    return view('Admin/Produit/produit',$data);
  }

// ----- create ----- 
  public function insert(Request $request)
  {             
    return view('Admin/Produit/newProduit');
  }
  public function post(Request $request)
  {
    Produit::create(
      array(
        'nomProduit'=>($request->input('nomProduit')),
        'unite'=>($request->input('unite')),
        'prix'=>($request->input('prix')),
        'categorie_id'=>($request->input('categorie_id'))
        ));
    return redirect('list-produits');
  }


// ----- update ----- 
  public function update($id){
    $element=Produit::find($id);
    $data = array(
      'id' => $id, 
      'nomProduit' => $element->nomProduit,
      'unite' => $element->unite,
      'prix' => $element->prix,
      'categorie_id' => $element->categorie_id
      );
    return view('Admin/Produit/updateProduit',$data);
  }
  public function updateInsert(Request $request)
  {
    $element=Produit::find($request->input('id'));
    $element->nomProduit=($request->input('nomProduit'));
    $element->unite=($request->input('unite'));
    $element->prix=($request->input('prix'));
    $element->categorie_id=($request->input('categorie_id'));
    $element->save();
    return redirect('list-produits');
  }

// ----- delete ----- 
  public function delete($id)
  {
    $element=Produit::find($id);
    $element->delete();
    return redirect('list-produits');
  }

}