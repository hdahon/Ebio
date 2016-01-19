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
           $data = array('adherants' => $adherants);
            return view('pages/adherant',$data);

    }
        
   
    
}