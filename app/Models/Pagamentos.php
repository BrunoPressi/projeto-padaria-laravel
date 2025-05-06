<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamentos extends Model
{
    protected $table = 'pagamentos';
    protected $fillable = ['metodo', 'total', 'fk_vendas_id'];
}
