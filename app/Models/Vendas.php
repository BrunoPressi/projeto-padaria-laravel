<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    protected $table = 'vendas';
    protected $fillable = ['quantidade_itens', 'preco_total', 'fk_cliente_id'];
}
