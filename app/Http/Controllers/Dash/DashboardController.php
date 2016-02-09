<?php

namespace App\Http\Controllers\Dash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\RoleAmapien;

class DashboardController extends Controller
{

    public function home(Request $request)
    {
<<<<<<< HEAD
        $role = Auth::user()->roleamapien_id;
        $niveau = RoleAmapien::find($role)->niveau;
        $data = array('user' => Auth::user(),
            'date' => date('Y-m-d'));
        if ($role == 5) {
            return view('dashboard/home')->with($data);
        } elseif ($role == 4) {
            return view('ReferentPlus/referentPlus')->with($data);
        }
        elseif ($role == 3) {
            return view('Referent/referent')->with($data);
        }
    }
        
=======
        $role = Auth::user()->roleAmapien;
        $data = array('name' => Auth::user()->nom, 'date' => date('Y-m-d'), 'role' => Auth::user()->roleamapien_id);
        // echo $data['role'] -> 1 = admin
        if ($data['role']=='1'){
            return view('dashboard/homeAdmin')->with($data);
        }else {            
            if ($role == 1) {
                return view('dashboard/home')->with($data);
            } else {
                return view('dashboard/referent')->with($data);
            }
        }
    }
    public function produit(Request $request)
    {

        return view('pages/produit');

    }
>>>>>>> 62a8f61300193f2ba636b506f4fe4f85057abd26
}