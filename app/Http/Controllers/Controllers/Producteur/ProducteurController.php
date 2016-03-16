<?php

namespace App\Http\Controllers\Producteur;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class ProducteurController extends Controller
{
    public function prod($id)
    {
    	$prod = User::where('id','=',$id)->get();
    	$data = array('prod'=> $prod->get(0));
    	//output resultat retourné :
    	//echo "resultat :" . $prod->get(0);
    	return view('dashboard/producteur',$data);
    }
}
