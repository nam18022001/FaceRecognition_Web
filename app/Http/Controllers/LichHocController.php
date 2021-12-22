<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Models\LichHoc;
use App\Models\Lop;
use App\Models\MonHoc;
use App\Models\GiaoVien;
use App\Models\SinhVienAuth;
use App\Models\Camera;
use Str;
use File;
use DB;

class LichHocController extends Controller
{
    //
    public function dsLichHoc()
    {
        # code...
        $lichhoc = LichHoc::all();
        return view('admin.lichhoc.lichhoc', ['lichhoc' => $lichhoc]);
    }
    public function viewThem()
    {
        # code...
        $lop = Lop::all();
        $sv = SinhVienAuth::all();
        $monhoc = MonHoc::all();
        return view('admin.lichhoc.them',
        [
            'lop' => $lop,
            'monhoc' => $monhoc,
            'sv' => $sv,

        ]
    );
    }
    public function add(Request $res)
    {
        
        # code...
        $dssv = implode(',', $res->sinhvien);
        $camera = Camera::where('idLop', $res->lop)->get()->first();
        $lichhoc = new LichHoc();
        $lichhoc->idCamera = $camera->id;
        $lichhoc->idMonHoc = $res->monhoc;
        $lichhoc->idGiaoVien = $res->giaovien;
        $lichhoc->idHocSinh = $dssv;
        $lichhoc->TimeBegin = $res->timebegin;
        $lichhoc->TimeFinish = $res->timefinish;
       
        
        $mh = MonHoc::find($res->monhoc);
        $tenMH = $mh->Tên;
        $gv = GiaoVien::find($res->giaovien);
        $tenGV = $gv->HoTen;
        $avatar_gv = $gv->avatar; 
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
        $asc = public_path().'lichhoc\\'.$tenLH.'\\';
        $folderName = str_replace("\\", "/", $asc);    
        $lichhoc->folder = $folderName;
        $lichhoc->save();

        Schema::create($tenLH, function (Blueprint $table) {
            $table->increments('id');
            $table->string('idLichHoc')->nullable();
            $table->string('MaSV');
            $table->string('diemdanh');
            $table->string('thoigiandiemdanh')->nullable();
            $table->timestamps();
        });

        if (! File::exists('lichhoc/'.$tenLH.'')) {
            # code...
            File::makeDirectory('lichhoc/'.$tenLH.'');

           
            $cu = 'giaovien_avatars/'.$avatar_gv;
            $moi = 'lichhoc/'.$tenLH.'/'.$avatar_gv;
            File::copy(''.$cu.'' , ''.$moi.'');

            $arr[] = explode(',', $dssv);
            foreach ($arr[0] as $key) {
                $sv = SinhVienAuth::find($key);
                $avatar = $sv->avatar;
                $oldPath = 'sinhvien_avatars/'.$avatar;
                $newPath = 'lichhoc/'.$tenLH.'/'.$avatar;
                File::copy(''.$oldPath.'', ''.$newPath.'');
                $idLast = LichHoc::latest()->first();
                DB::insert("INSERT INTO $tenLH (idLichHoc, MaSV, diemdanh) VALUES  ('$idLast->id', '$sv->MaSV', '2')");

            }
        }
        
        return redirect('admin/lichhoc')->with('themthanhcong','Thêm lịch học thành công');
    }
    public function dssv(Request $res)
    {
        # code...
    }
    public function xoaLH($id)
    {
        # code...
       $lh =  LichHoc::find($id);
       $lh->delete();
       return redirect('admin/lichhoc')->with('themthanhcong','Xóa lịch học thành công');
    }
   
}
