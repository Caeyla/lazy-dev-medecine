<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\constante\Constante;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials=$request->only('name','password');
        if (Auth::attempt($credentials)) {

            return redirect()->route('welcome');

        } else {

            return redirect()->back()->withErrors(['message' => 'Invalid credentials']);

        }
    }

    function  handleSuccessRedirect(){
        $nextPage;
        if(Auth::user()->status==Constante::$EMPLOYE_STATUS){
            $nextPage="employe";
        }else if(Auth::user()->status==Constante::$EMPLOYE_ADMIN){
            $nextPage="admin";
        }
        return $nextPage;
    }
}
