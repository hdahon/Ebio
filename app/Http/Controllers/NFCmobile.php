<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NFCmobile extends Controller
{
   public function indentifiants(Request $request){
        var $bool =  false;

        return response()->json(['connected' => $bool]);
   }

   public function signature(Request $request){
    var $bool = false; 
    
    return response()->json(['signed'=>$bool])
   }
}
