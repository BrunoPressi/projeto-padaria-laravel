<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itens_vendas extends Model
{
    protected $table = 'itens_vendas';
    protected $fillable = ['fk_produto_id', 'fk_vendas_id', 'quantidade', 'preco_unitario'];
}
