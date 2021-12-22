<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GiaoVien;
use App\Models\MonHoc;

class GiaoVienAdminController extends Controller
{
    //
    public function dsGiaoVien()
    {
        $gv = GiaoVien::all();
       
        return view('admin.giaovien.dsGiaoVien', [
            'sinhvien' => $gv,
            
        ]);

    }
    public function viewThem()
    {
        # code...
        $monhoc = MonHoc::all();
        return view('admin.giaovien.them', [
            'monhoc' => $monhoc,
            
        ]);
    }
    public function add(Request $request)
    {
        # code...
        $gv = new GiaoVien();
        $gv->HoTen = $request->name;
        $gv->MaGV = $request->MSSV;
        $gv->password = bcrypt($request->password);     
        $gv->idMonHoc = $request->monhoc;
        $avatar = $request->file('avatar');
        $avatarType = $avatar->extension();
        if ($avatarType == 'jpg' || $avatarType == 'png' || $avatarType == 'jpeg') {
            # code...
            if ($avatar->getSize() < 8388608) {
                # code...
                $avatar->move('giaovien_avatars/', $request->MSSV.".".$avatarType);
                $gv->avatar = $request->MSSV.".".$avatarType;
            }else {
                # code...
                return redirect()->back()->with('thongbaoimg', 'Lựa chọn ảnh nào bé hơn 8MB');
            }
        }else {
            # code...
            return redirect()->back()->with('thongbaoimg', 'Fie bạn đưa lên không phải file ảnh');
        }
        $gv->save();
        return redirect('admin/giaovien')->with('themthanhcong', 'Thêm giáo viên '.$request->MSSV.' thành công');

    }
    public function xoaGV($id)
    {
        # code...
        $sv = SinhVienAuth::find($id);
        if ($sv) {
            # code...
            $sv->delete();
            
        }
         return redirect('admin/giaovien')->with('themthanhcong', 'Xóa thành công');
    }
}
