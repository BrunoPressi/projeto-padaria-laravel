<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'preco', 'data_vencimento', 'data_fabricacao', 'fk_estoque_id'];
}
