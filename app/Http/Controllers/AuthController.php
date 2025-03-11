<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function register(Request $request){

        $fields = $request->validate(
            [
                'name'=>'required|min:5',
                'email'=>'required|unique:users',
                'role'=>'required',
                'password'=>'required|confirmed|min:6'

            ]   
            );

        $user = User::create($fields);
        return $user;
    }
}
