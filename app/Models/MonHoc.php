<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    use HasFactory;
    protected $table = 'monhoc';

    public function lichhoc()
    {
        # code...
        return $this->hasMany('App\Models\LichHoc', 'idMonHoc', 'id');
    }
    public function giaovien()
    {
        # code...
        return $this->hasMany('App\Models\GiaoVien', 'idMonHoc', 'id');
    }
}
