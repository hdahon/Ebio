<?php

namespace App\Http\Controllers\Referent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class ReferentController extends Controller
{

    
        
    public function cheque(Request $request)
    {

        return view('pages/cheque');

    }
    public function contrat(Request $request)
    {

        return view('pages/contrat');

    }
    
}