<?php
namespace App\Http\Controllers\Dash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\RoleAmapien;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Dash\Session;

class DashboardController extends Controller
{

    //@TODO Page AMAPIEN vérifier le page producteur 
    public function home(Request $request)
    {
        /* 
        L'initialisation de la session ne marchant pas dans AuccountController je la mets ici.
        On passe obligatoirement par ce home durant notre login.
        */    
        if ( !Auth::guest() and !(session()->has('role')) ) {
            //création d'une session avec le niveau de l'amapien, pour savoir si il est producteur par exemple
            $role = Auth::user()->roleamapien_id;
            $niveau = RoleAmapien::find($role)->niveau;
            session()->put('role',$niveau);
            //echo "session enregistré : .$niveau";
            $niveau = session('role');
        } elseif (!Auth::guest() and session()->has('role') ) {
            $role = Auth::user()->roleamapien_id;
            $niveau = session('role');
        
        } else {
            $niveau = 0;
        }
        
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
            'date' => date('Y-m-d'),
            'role' => RoleAmapien::find($role)->nomRole);
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
    
}