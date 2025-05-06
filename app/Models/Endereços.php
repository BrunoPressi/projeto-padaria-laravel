<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereços extends Model
{
    protected $table = 'enderecos';
    protected $fillable = ['numero', 'rua', 'bairro'];
}
