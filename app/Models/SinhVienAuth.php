<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class SinhVienAuth extends Model implements AuthenticatableContract
{
    use HasFactory;
    use AuthenticableTrait;
    protected $table = "sinhvienAuth";
    
}
