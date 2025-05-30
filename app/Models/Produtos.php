<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'preco', 'peso', 'quantidade_estoque', 'data_vencimento', 'data_fabricacao'];
}
