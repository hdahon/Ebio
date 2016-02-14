<?php

namespace App\Http\Controllers\Dash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\RoleAmapien;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    //@TODO Page AMAPIEN vérifier le page producteur 
    public function home(Request $request)
    {
        $role = Auth::user()->roleamapien_id;
        $niveau = RoleAmapien::find($role)->niveau;
        //echo $role; 
        
        if ($niveau == 1) {
            //echo '1';
            $data = array('user' => Auth::user(),'role' => RoleAmapien::find($role)->nomRole,'date' => date('Y-m-d'));
            return view('dashboard/amapien_accueil')->with($data);

        } elseif( $niveau == 2 ) {
            //echo '2';
            $data = array('prod' => Auth::user(),
            'date' => date('Y-m-d'),
            'role' => RoleAmapien::find($role)->nomRole);
            return view('dashboard/producteur')->with($data);

        } elseif( $niveau == 3) {
            //echo '3';
            $data = array('name' => Auth::user()->nom,
            'date' => date('Y-m-d'));
            return view('dashboard/referent')->with($data);
        } elseif( $niveau == 4) {
            //echo '4';
            $data = array('user' => Auth::user(),'role' => RoleAmapien::find($role)->nomRole,'date' => date('Y-m-d'));
            return view('dashboard/amapien_accueil')->with($data);

        } elseif( $niveau == 5 ) {
            // echo '5';
            $data = array('name' => Auth::user()->nom, 'date' => date('Y-m-d'), 'role' => Auth::user()->roleamapien_id);
            return view('dashboard/homeAdmin')->with($data);

        } else {
            $data = array('name' => Auth::user()->nom,
            'date' => date('Y-m-d'));
            return view('dashboard/home')->with($data);
        }
    }
    
        /* Todo : rajouter si besoin 
        if ($role == 5) {
            return view('dashboard/home')->with($data);
        } elseif ($role == 4) {
            return view('ReferentPlus/referentPlus')->with($data);
        }
        elseif ($role == 3) {
            return view('Referent/referent')->with($data);
        }
        */

    public function produit(Request $request)
    {
            return view('pages/produit');

    }
}