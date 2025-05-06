<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoques extends Model
{
    protected $table = 'estoques';
    protected $fillable = ['quantidade'];
}
