<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVienAuth;
class SinhVienAdminController extends Controller
{
    //
    public function dsSinhVien()
    {
        $sv = SinhVienAuth::all();
        return view('admin.sinhvien.dsSinhVien', ['sinhvien' => $sv]);

    }
    public function viewThem()
    {
        # code...
        return view('admin.sinhvien.them');
    }
    public function add(Request $request)
    {
        # code...
        $sinhvien = new SinhVienAuth();
        $sinhvien->Ten = $request->name;
        $sinhvien->Ho = $request->lastname;
        $sinhvien->MaSV = $request->MSSV;
        $sinhvien->password = bcrypt($request->password);
        $avatar = $request->file('avatar');
        $avatarType = $avatar->extension();
        if ($avatarType == 'jpg' || $avatarType == 'png' || $avatarType == 'jpeg') {
            # code...
            if ($avatar->getSize() < 8388608) {
                # code...
                $avatar->move('sinhvien_avatars/', $request->MSSV.".".$avatarType);
                $sinhvien->avatar = $request->MSSV.".".$avatarType;
            }else {
                # code...
                return redirect()->back()->with('thongbaoimg', 'Lựa chọn ảnh nào bé hơn 8MB');
            }
        }else {
            # code...
            return redirect()->back()->with('thongbaoimg', 'Fie bạn đưa lên không phải file ảnh');
        }
        $sinhvien->save();
        return redirect('admin/sinhvien')->with('themthanhcong', 'Thêm sinh viên '.$request->MSSV.' thành công');

    }
    public function xoaSV($id)
    {
        # code...
        $sv = SinhVienAuth::find($id);
        if ($sv) {
            # code...
            $sv->delete();
            
        }
         return redirect('admin/sinhvien')->with('themthanhcong', 'Xóa thành công');
    }
}
