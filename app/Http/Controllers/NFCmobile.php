<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/*
* vérifier les routes dans route
*/

class NFCmobile extends Controller
{
	/*@Todo 
		vérifier dans la bdd si il y a bien l'utilisateur et renvoyer le booléan correspondant
		ne pas oublier de décommenter le code sur android
	*/
   public function indentifiants(Request $request){
   	// récupération "email" et "password"
   	var $email = $request->input("email");
   	var $password= $request->input("password"); 
    var $bool =  false;

    return response()->json(['connected' => $bool]);
   }

   /* @Todo enregistrer la signature dans la feuille de présence associé
   et renvoyer le boolean
   */
   public function signature(Request $request){
   	// récupération "email"de l'utilisateur et "sign" à true 
   	var $email = $request->input("email");
   	var $sing  = $request->input("sign"); // <= osef je crois
    var $bool = false; 
    
    return response()->json(['signed'=>$bool])
   }
}
