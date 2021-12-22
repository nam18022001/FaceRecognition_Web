<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;
class LoginAdminController extends Controller
{
    //
    public function getLogin()
    {
        # code...
        if (Auth::check()) {
            # code...
            return redirect('admin');
        }else{
            return view('login.loginAdmin');
        }
      
    }
    public function postLogin(Request $request)
    {
        
        if (Auth::attempt(['email' => $request->username, 'password' => $request->pass])) {
            
            return redirect('admin');
        }else {
            return redirect('admin/login')->with('loginfail', 'Sai tên đăng nhập hoặc mật khẩu');
        }
    }
    public function logout()
    {
        # code...
        Auth::logout();
        return redirect('admin');
    }
}
