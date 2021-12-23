<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LichHoc;
use App\Models\Lop;
use App\Models\MonHoc;
use App\Models\GiaoVien;
use App\Models\SinhVienAuth;
use App\Models\Camera;
use Str;
use File;
use Auth;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use DB;

class GiaoVienController extends Controller
{
    //
    public function view()
    {
        # code...
        $lh = LichHoc::where('idGiaoVien', Auth::guard('giaovien')->id())->get();
        if(Auth::guard('giaovien')->check()){
            return view('giaovien.index',['gv' => $lh]);
        }else{
            return redirect('giaovien/login');
        }
    }
    public function viewLogin()
    {
        # code...
        return view('login.loginGV');
    }
    public function postLogin(Request $res)
    {
        # code...
        if (Auth::guard('giaovien')->attempt(['MaGV' => $res->username, 'password' => $res->pass])) {
            
            return redirect('giaovien');
        }else {
            return redirect('giaovien/login')->with('loginfail', 'Sai tên đăng nhập hoặc mật khẩu');
        }
        
    }
    public function logout()
    {
        # code...
        if (Auth::guard('giaovien')->check()) {
            # code...
            Auth::guard('giaovien')->logout();
            return redirect('giaovien');
        }else{
            return redirect('giaovien');
        }
    }
    public function diemdanh($id)
    {
        # code...
        $lh = LichHoc::find($id);
        $string = $lh->id;
        $tenMH = $lh->monhoc->Tên;
        $tenGV = $lh->giaovien->HoTen;
        $str = $tenMH.'_'.$tenGV;

        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);

        $tenLH = strtolower(preg_replace('/\s+/', '', $str));
        DB::update("UPDATE $tenLH set diemdanh = 0");
        $url = 
        
        $result = shell_exec('python main.py '. $string . ' ' . $tenLH);
        return redirect('giaovien');
    }
}
