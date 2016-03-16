<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\RoleAmapien;

class RoleController extends Controller
{

	// -- list
	public function getAll()
	{		
		$roles= RoleAmapien::all();
		$data = array('roles' => $roles);
		return view('admin/role/role',$data);
	}

	// ----- create ----- 
	public function insert(Request $request)
	{             
		return view('Admin/Role/newRole');
	}
	public function post(Request $request)
	{
		$nomRole=$request->input('nomRole');
		$niveau=$request->input('niveau');

		RoleAmapien::create(
			array(
				'nomRole'=>$nomRole,
				'niveau'=>$niveau
				));
		return redirect('list-roles');
	}
	
	// ----- update ----- 
	public function update($id)
	{
		$role=RoleAmapien::find($id);
		$data = array(
			'id' => $id, 
			'nomRole' => $role->nomRole,
			'niveau' => $role->niveau
			);
		return view('Admin/Role/updateRole',$data);
	}	
	public function updateInsert(Request $request)
	{
		$element=RoleAmapien::find($request->input('id'));
		$element->nomRole=($request->input('nomRole'));
		$element->niveau=($request->input('niveau'));
		$element->save();
		return redirect('list-roles');
	}

	// ----- delete ----- 
	public function delete($id)
	{
		$element=RoleAmapien::find($id);
		$element->delete();
		return redirect('list-roles');
	}

	/**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nomRole' => 'required|max:255',
            'niveau' =>'required'
        ]);
    }
}