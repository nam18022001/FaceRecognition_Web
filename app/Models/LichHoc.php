<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichHoc extends Model
{
    use HasFactory;
    protected $table = 'lichhoc';

    /**
     * Get the camera that owns the LichHoc
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function camera()
    {           
        return $this->belongsTo('App\Models\Camera', 'idCamera', 'id');
    }
    public function monhoc()
    {           
        return $this->belongsTo('App\Models\MonHoc', 'idMonHoc', 'id');
    }
    public function giaovien()
    {           
        return $this->belongsTo('App\Models\GiaoVien', 'idGiaoVien', 'id');
    }
}
