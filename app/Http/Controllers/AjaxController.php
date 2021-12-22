<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GiaoVien;
use App\Models\LichHoc;
use App\Models\SinhVienAuth;
use DB;

class AjaxController extends Controller
{
    //
    public function giaovien($idMonHoc)
    {
        # code...
        $gv = GiaoVien::where('idMonHoc', $idMonHoc)->get();
        foreach ($gv as $value){
            # code...
            echo "<option class='select-option' value='".$value->id."'>".$value->HoTen."</option>";
        }
    }
    public function dssv($idLH)
    {
        # code...
        $lh = LichHoc::find($idLH);
        $idsv = $lh->idHocSinh;
        $arr[] = explode(',',$idsv);
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

        foreach ($arr[0] as $key) {
            # code...
            $sv = SinhVienAuth::find($key);
            $diemdanh = DB::table($tenLH)->where('MaSV', $sv->MaSV)->first();
            if ($diemdanh->diemdanh == 1) {
                # code...
                $stringStatus = "Có mặt";
                $stringColor = " #00ff00";
            }elseif($diemdanh->diemdanh == 0){
                $stringStatus = "Vắng";
                $stringColor = " #ff0000";
            }else{
                $stringStatus = "Chưa có";
                $stringColor = " #ffcc00";
            }
            echo 
                "
                
                <div class='row'>
                    <div class='col-md-4'>".$sv->MaSV."</div>
                    <div class='col-md-4'>".$sv->Ten." ".$sv->Ho."</div>
                    <div class='col-md-4' style='color:".$stringColor."'>".$stringStatus."</div>
                </div>";
        }
    }
}
