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
        
}