<?php

namespace App\Http\Controllers\Referent\Adherant;

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
		/*foreach($adherants as $ad){
        	$coadherant[$ad->coadherant_id]=User::find($adherants->coadherant_id);  
        } */
        $data = array('adherants' => $adherants);
        if ($niveau == 5){
        	return view('Admin/Adherant/adherant',$data);
        }else{
        	return view('Referent/Adherant/adherant',$data);
        }
    }
    
}