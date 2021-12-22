<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    //
    public function index()
    {
        # code...
        if (Auth::check()) {
            # code...
            return view('admin.index');
        }else {
            return  redirect('admin/login');
        }
    }
}
