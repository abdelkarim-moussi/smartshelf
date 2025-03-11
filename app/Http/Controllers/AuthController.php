<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function register(Request $request){

        $fields = $request->validate(
            [
                'name'=>'required|min:3',
                'email'=>'required|unique:users',
                'role'=>'required',
                'password'=>'required|confirmed|min:6'

            ]   
            );

        $user = User::create($fields);
        $token = $user->createToken($user->name);

        return [
            'user'=>$user,
            'token'=>$token->palinTextToken
        ];
    }
}
