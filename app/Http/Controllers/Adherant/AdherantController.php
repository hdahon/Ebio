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
		$adherants= User::where('id','!=',Auth::user()->id)->get();
		$role = Auth::user()->roleAmapien;
		$data = array('adherants' => $adherants);
		$niveau = RoleAmapien::find($role)->niveau;

		// 5 admin
		if ($role=="administrateur"){
			return view('admin/adherant',$data);
		}else{
			return view('pages/adherant',$data);
		}
	}



}