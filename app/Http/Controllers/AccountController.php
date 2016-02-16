<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AccountController extends Controller
{
    public function login() {
        // Getting all post data
        $data = Input::all();
        // Applying validation rules.
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:6',
        );
        $validator = Validator::make($data, $rules);
        if ($validator->fails()){
            // If validation falis redirect back to login.
            return Redirect::to('login')->withInput(Input::except('password'))->withErrors($validator);
        }
        else {
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );
            // doing login.
            if (Auth::validate($userdata)) {
                if (Auth::attempt($userdata)) {
                    //création d'une session avec le niveau de l'amapien, pour savoir si il est producteur par exemple
                    $role = Auth::user()->roleamapien_id;
                    $niveau = RoleAmapien::find($role)->niveau;
                    Session::put('role',$niveau);
                    return Redirect::intended('/');
                }
            }
            else {
                // if any error send back with message.
                Session::flash('error', 'Something went wrong');
                return Redirect::to('login');
            }
        }
    }

}
