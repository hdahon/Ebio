<?php

namespace App\Http\Controllers\Adherant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\RoleAmapien;

class AdherantController extends Controller
{

	public function adherant()
	{		
		$role = Auth::user()->roleamapien_id;
		$niveau = RoleAmapien::find($role)->niveau;
		$adherants= User::where('id','!=',Auth::user()->id)->get();
		$data = array('adherants' => $adherants);
		//echo $niveau;
		if ($niveau ==   5) {
			return view('admin/adherant',$data);
		}else{
			return view('pages/adherant',$data);
		}
	}


    public function postInsert(Request $request)
    {
        $roleamapien_id = '5';
        $password='password';
        $nom=$request->input('nom');
        $prenom=$request->input('prenom');
        // echo $prenom;
        $email=$request->input('email');
        $tel=$request->input('tel');

        User::create(array('nom'=>$nom,'prenom'=>$prenom));
        /*return redirect('adherant/listAdmin');*/
        echo "$nom bien enregistré";
        return;
    }

    public function insert(Request $request)
    {             
        return view('admin/newAdherant');

    }


    public function updateInsert(Request $request)
    {
        $idUser=$request->input('idUser');
        $nom=$request->input('nom');
        $prenom=$request->input('prenom');
        $email=$request->input('email');
        $tel=$request->input('tel');
        $roleamapien_id=$request->input('roleamapien_id');

        $user=User::find($idUser);
        $user->nom=$nom;
        $user->prenom=$prenom;
        $user->email=$email;
        $user->tel=$tel;
        $user->roleamapien_id=$roleamapien_id;
        $user->save();
        return redirect('adherant/listAdmin');
    }

    public function update($id){
      	$user=User::find($id);
       	$data = array(
       		'id' => $id, 
       		'roleamapien_id' => $user->roleamapien_id,
       		'nom' => $user->nom,
       		'prenom' => $user->prenom,
       		'email' => $user->email,
       		'tel' => $user->tel
       		);
        return view('admin/updateAdherant',$data);
    }

	public function deleteUser($id)
	{
		$user=User::find($id);
		$user->delete();

		return redirect('referent/adherant');
	}
}