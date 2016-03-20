<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Livraisons;
use App\RoleAmapien;
use App\Categorie;

class LivraisonsController extends Controller
{

	// -- list
	public function getAll()
	{		
		$livraisons= Livraisons::all();
		$categories=array();
		$producteurs=array();
		foreach ($livraisons as $key => $value) {
           $categories[$key]=Categorie::find($value->categorie_id);
           $producteurs[$key]=User::find($value->producteur_id);
         }
		$data = array('livraisons' => $livraisons,
					  'categories'=>$categories,
					  'producteurs' =>$producteurs);
		return view('Admin/Livraisons/livraison',$data);
	}

	// ----- create ----- 
	public function insert(Request $request)
	{             
		return view('Admin/Livraisons/newLivraison');
	}
	public function post(Request $request)
	{
		$id=$request->input('id');
		$dateLivraison=$request->input('dateLivraison');
		$quantite=$request->input('quantite');
		$amapien_id=$request->input('amapien_id');
		$produit_id=$request->input('produit_id');
		$producteur_id=$request->input('producteur_id');
		$dateDeLivraison=$request->input('dateDeLivraison');

		Livraisons::create(
			array(
				'id'=>$id,
				'dateLivraison'=>$dateLivraison,
				'quantite'=>$quantite,
				'amapien_id'=>$amapien_id,
				'produit_id'=>$produit_id,
				'producteur_id'=>$producteur_id,
				'dateDeLivraison'=>$dateDeLivraison
				));
		return redirect('list-livraisons');
	}
	
	// ----- update ----- 
	public function update($id)
	{
		$livraison=Livraisons::find($id);
		$data = array(
			'id' => $id, 
			'dateLivraison'=>$livraison->dateLivraison,
			'quantite'=>$livraison->quantite,
			'amapien_id'=>$livraison->amapien_id,
			'produit_id'=>$livraison->produit_id,
			'producteur_id'=>$livraison->producteur_id,
			'dateDeLivraison'=>$livraison->dateDeLivraison
			);
		return view('Admin/Livraisons/updateLivraison',$data);
	}	
	public function updateInsert(Request $request)
	{
		$element=Livraisons::find($request->input('id'));

		$element->dateLivraison=($request->input('dateLivraison'));
		$element->quantite=($request->input('quantite'));
		$element->amapien_id=($request->input('amapien_id'));
		$element->produit_id=($request->input('produit_id'));
		$element->producteur_id=($request->input('producteur_id'));
		$element->dateDeLivraison=($request->input('dateDeLivraison'));

		$element->save();
		return redirect('list-livraisons');
	}

	// ----- delete ----- 
	public function delete($id)
	{
		$element=Livraisons::find($id);
		$element->delete();
		return redirect('list-livraisons');
	}
}