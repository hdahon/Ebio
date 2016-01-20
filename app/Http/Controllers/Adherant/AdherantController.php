<?php

namespace App\Http\Controllers\Adherant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdherantController extends Controller
{

	public function adherant()
	{		
		$role = Auth::user()->roleAmapien;
		echo $role;
		$niveau = RoleAmapien::find($role);
		$adherants= User::where('id','!=',Auth::user()->id)->get();
		$data = array('adherants' => $adherants);
		if ($niveau ==   5){
			return view('admin/adherant',$data);
		}else{
			return view('pages/adherant',$data);
		}
		
		
	}
	
	
}