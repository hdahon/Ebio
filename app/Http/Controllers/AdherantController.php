<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\RoleAmapien;
use App\Categorie;
use App\Contrat;
use App\ContratClient;


class AdherantController extends Controller
{

	public function adherant()
	{		
		$idUser= Auth::user()->id;
		$role = Auth::user()->roleamapien_id;
		$niveau = RoleAmapien::find($role)->niveau;



		//$adherants= User::where("id","<>",$idUser)->orderBy('nom')->get();
		// producteur
		if ($role==2){
			$adherants=array();

			$categoriesProducteur = Categorie::where('producteur_id',$idUser)->get();
			foreach ($categoriesProducteur as $key => $value) {
				$contratsProd = Contrat::where('categorie_id',$value->id)->get();
				foreach ($contratsProd as $key => $value) {
					$contratsClientProd = ContratClient::where('contrat_id',$value->id)->get();
					foreach ($contratsClientProd as $key => $value) {
						//$userss = User::where('id',$value->amapien_id)->get();
						//echo json_encode($userss);
						$ussers= User::where('id',$value->amapien_id)->get();
						foreach ($ussers as $key => $value) {
							//echo ($value->id);
							$adherants[$key]=$value->id;
						}
					}
				}
			}
			//echo json_encode($adherants);
			$adherants=User::whereIn('id',$adherants)->paginate(5);
		}else{
			$adherants= User::orderBy('nom')->paginate(5);
		}

		$coadherants="";
		$roleamapiens=array();

		foreach($adherants as $key => $ad){
			$coadherants[$key]=User::find($adherants[$key]->coadherant_id);  
			$roleamapiens[$key]=RoleAmapien::find($adherants[$key]->roleamapien_id);
		} 

		$data = array('adherants' => $adherants,
			'coadherants'=>$coadherants,'roleamapiens'=>$roleamapiens);
		if ($niveau ==   5){
			return view('admin/adherant/adherant',$data);
		}else if ($niveau == 4  ){
			return view('referentPlus/adherant/adherant',$data);
		}else if ($niveau == 2  ){
			return view('producteur/adherant/adherant',$data);
		}else {
			return view('referent/adherant/adherant',$data);
		}
	}



	public function insert(Request $request)
	{   
	    $adherants= User::where("roleamapien_id",1 ||"roleamapien_id",3)->get();   
	    $data=array('adherants'=>$adherants);    
		return view('admin/adherant/newAdherant',$data);
	}

	public function postUser(Request $request){

		$nom=$request->input('nom');
		$prenom=$request->input('prenom');
		$email=$request->input('email');
        $password=bcrypt($request->input('password'));
		$tel=$request->input('tel');
		$adresse=$request->input('adresse');
		$numSiret=$request->input('numSiret');
		$roleamapien_id = $request->input('roleamapien_id');
		$coadherant_id = $request->input('coadherant_id');

        // echo $prenom;
		if($coadherant_id != ""){
		User::create(
			array(
				'nom'=>$nom,
				'prenom'=>$prenom,
				'email'=>$email,
				'password'=>$password,
				'tel'=>$tel,
				'adresse'=>$adresse,
				'numSiret'=>$numSiret,
				'roleamapien_id'=>$roleamapien_id,
				'coadherant_id'=>$coadherant_id
				));
		}else{
			User::create(
			array(
				'nom'=>$nom,
				'prenom'=>$prenom,
				'email'=>$email,
				'password'=>$password,
				'tel'=>$tel,
				'adresse'=>$adresse,
				'numSiret'=>$numSiret,
				'roleamapien_id'=>$roleamapien_id,
				));
		}
		return redirect('list-users');
		
	}

	public function updateUser($id){
		$roles=RoleAmapien::All();
		$user=User::find($id);
		$adherants= User::where("roleamapien_id",1 || "roleamapien_id",3)->get();   
		$data = array(
			'id' => $id, 
			'nom' => $user->nom,
			'prenom' => $user->prenom,
			'email' => $user->email,
			'password'=> $user->password,
			'tel' => $user->tel,
			'adresse'=> $user->adresse,
			'numSiret'=> $user->numSiret,
			'roleamapien_id' => $user->roleamapien_id,
			'coadherant_id'=> $user->coadherant_id,
			'adherants'=>$adherants,
			'roles'=>$roles
			);
		return view('admin/adherant/updateAdherant',$data);
	}

    public function updateInsert(Request $request)
    {
        $idUser=$request->input('idUser');
        $nom=$request->input('nom');
        $prenom=$request->input('prenom');
        $email=$request->input('email');

        $newPassword=$request->input('newPassword');
        $newPassword2=$request->input('newPassword2');
        $chp_newMDP=$request->input('chp_newMDP');

        if ($chp_newMDP=="false"){

        }else{
        	$password=bcrypt($request->input('newPassword'));
        }

        $adresse=$request->input('adresse');
        $numSiret=$request->input('numSiret');
        $tel=$request->input('tel');
        $roleamapien_id=$request->input('roleamapien_id');


        $user=User::find($idUser);
        $user->nom=$nom;
        if($request->input('coadherant_id') !=""){
        	$user->coadherant_id=$request->input('coadherant_id');
        }
        $user->prenom=$prenom;
        $user->email=$email;
        $user->tel=$tel;

        if ($chp_newMDP=="false"){

        }else{
        	$user->password=$password;
        }
        $user->adresse=$adresse;
        $user->numSiret=$numSiret;
        $user->roleamapien_id=$roleamapien_id;
        $user->save();
		return redirect('list-users');
    }

	public function deleteUser($id)
	{
		$user=User::find($id);
		$user->delete();

		return redirect('list-users');
	}

}