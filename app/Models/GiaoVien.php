<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class GiaoVien extends Model implements AuthenticatableContract
{
    use HasFactory;
    protected $table = "giaovien";
    use AuthenticableTrait;
    
    public function monhoc()
    {
        # code...
        return $this->hasMany('App\Models\MonHoc', 'idMonHoc', 'id');
        
    }
    public function lichhoc()
    {
        # code...
        return $this->hasMany('App\Models\LichHoc', 'idGiaoVien', 'id');
        
    }
}
