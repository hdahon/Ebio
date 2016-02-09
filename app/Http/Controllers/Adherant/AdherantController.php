<?php

namespace App\Http\Controllers\Adherant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\RoleAmapien;

class AdherantController extends Controller
{

	public function adherant()
	{		

		//$role = Auth::user()->roleAmapien;
		$role = Auth::user()->roleamapien_id;
		//echo $role;
		$niveau = RoleAmapien::find($role)->niveau;
		//echo $niveau;
		$adherants= User::where('id','!=',Auth::user()->id)->get();
		$data = array('adherants' => $adherants);

		if ($niveau ==   5){
			return view('admin/adherant',$data);
		}else{
			return view('pages/adherant',$data);
		}
	}



	public function deleteUser($id)
	{
		$user=User::find($id);
		$user->delete();

		return redirect('referent/adherant');
	}
}