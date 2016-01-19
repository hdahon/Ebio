<?php

namespace App\Http\Controllers\Referent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReferentController extends Controller
{

    public function adherant(Request $request)
    {

            return view('pages/adherant');

    }
        public function produit(Request $request)
    {

            return view('pages/produit');

    }
    public function cheque(Request $request)
    {

        return view('pages/cheque');

    }
    public function contrat(Request $request)
    {

        return view('pages/contrat');

    }
}