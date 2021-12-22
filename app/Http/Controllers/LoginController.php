<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class LoginController extends Controller
{
    //
    public function getLogin()
    {
        # code...
        return view("login.login");
    }
    public function postLogin(Request $request)
    {
        # code...
        if(Auth::guard('sinhvien')->attempt(['MaSV' => $request->username, 'password' => $request->pass])){
            return 'oke';
        }else{
            return "not oke";
        }
        
    }
}
