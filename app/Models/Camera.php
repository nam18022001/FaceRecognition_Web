<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    use HasFactory;
    protected $table = 'camera';
    
    /**
     * Get the user that owns the Camera
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lop()
    {
        return $this->belongsTo('App\Models\Lop', 'idLop', 'id');
    }
    /**
     * Get all of the comments for the Camera
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lichhoc()
    {
        return $this->hasMany('App\Models\LichHoc', 'idCamera', 'id');
    }
}
