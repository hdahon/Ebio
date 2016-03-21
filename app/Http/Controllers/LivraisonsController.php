<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Livraisons;
use App\RoleAmapien;
use App\Categorie;
use App\ContratClient;
use App\Contrat;
use App\Panier;
use App\Produit;


class LivraisonsController extends Controller
{

	// -- list
	public function getAll()
	{		
		$livraisons= array();
		$categories=array();
		$producteurs=array();
		if(session('role') ==1 ){
			$contratClients =ContratClient::where('amapien_id',Auth::user()->id)->get();
			foreach ($contratClients as $k => $value) {
				$mcontrat=Contrat::find($value->contrat_id);
				foreach (Livraisons::All() as $key => $v) {
					if($value->periodicite_id == 1 && Auth::user()->id == $value->amapien_id){
						$liv=Livraisons::find($v->id);
						if($liv->semaine %2 ==0){
							$livraisons[$key]=$liv;
						}
						 
					}else if($value->periodicite_id == 2 &&  Auth::user()->id == $value->amapien_id){
						$liv=Livraisons::find($v->id);
						if($liv->semaine %2 !=0){
							$livraisons[$key]=$liv;
						}
					}else{
						$livraisons[$key]=Livraisons::find($v->id);

					} 
					$cat=Categorie::find($mcontrat->categorie_id);
           			$categories[$key]=$cat;
           			$producteurs[$key]=User::find($cat->producteur_id);
				}
				
         	} 
			$data = array('livraisons' => $livraisons,
					  'categories'=>$categories,
					  'producteurs' =>$producteurs);
				return view('amapien/livraisons/livraison',$data);

		}else{
		$livraisons= Livraisons::all();
		
		foreach ($livraisons as $key => $value) {
           $categories[$key]=Categorie::find($value->categorie_id);
           $producteurs[$key]=User::find($value->producteur_id);
         }
		$data = array('livraisons' => $livraisons,
					  'categories'=>$categories,
					  'producteurs' =>$producteurs);
		return view('Admin/Livraisons/livraison',$data);
	}
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

	// ----- editer ----- 
	public function editer($id)
	{
		$element=Livraisons::find($id);
		$categories=Categorie::all();
		$contrats=Contrat::all();
		$paniers=Panier::where("livraison_id",$element->id)->get();
		$amapiens=array();
		$catAmap=array();
		foreach ($paniers as $key => $value) {
				$prod=Produit::find($value->produit_id);
				$amapiens[$key]=User::find($value->user_id);
				$catAmap[$key]=Categorie::find($prod->categorie_id);
		}		
		$data=array('element'=>$element,
					'categories'=>$categories,
					'amapiens'=>$amapiens,
					'catAmapiens'=>$catAmap,
					'paniers'=>$paniers);
		return view('admin/livraisons/fichelivraisons',$data);
	}
}