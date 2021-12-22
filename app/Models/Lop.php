<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    use HasFactory;
    protected $table = 'lop';
    
    /**
     * Get the user associated with the Lop
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function camera()
    {
        return $this->hasOne('App\Models\Camera', 'idLop', 'id');
    }
    
}
