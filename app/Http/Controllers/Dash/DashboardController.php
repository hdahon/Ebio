<?php

namespace App\Http\Controllers\Dash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function home(Request $request)
    {
        $role = Auth::user()->roleAmapien;
        $data = array('name' => Auth::user()->nom,
            'date' => date('Y-m-d'));
        if ($role == 1) {
            return view('dashboard/home')->with($data);
        } else {
            return view('dashboard/referent')->with($data);
        }
    }
        public function produit(Request $request)
    {

            return view('pages/produit');

    }
}