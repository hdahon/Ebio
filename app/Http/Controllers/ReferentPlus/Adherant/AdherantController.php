<?php

namespace App\Http\Controllers\ReferentPlus\Adherant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\RoleAmapien;

class AdherantController extends Controller
{

	   public function adherant()
	{		

		$role = Auth::user()->roleamapien_id;
		$niveau = RoleAmapien::find($role)->niveau;
		$adherants= User::where('roleamapien_id',1)->get();
		$coadherants="";
		foreach($adherants as $key => $ad){
        	$coadherants[$key]=User::find($adherants[$key]->coadherant_id);  
      	} 
		$data = array('adherants' => $adherants,
						'coadherants'=>$coadherants);
		if ($niveau ==   5){
			return view('admin/adherant',$data);
		}else{
			return view('ReferentPlus/Adherant/adherant',$data);
		}

	    }
        
   
    
}