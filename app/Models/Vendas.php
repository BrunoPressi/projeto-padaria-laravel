<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    protected $table = 'vendas';
    protected $fillable = ['quantidade_itens', 'preco_total', 'fk_cliente_id'];

    public function produtos() {

        return $this->belongsToMany(Produtos::class, 'itens_vendas', 'fk_vendas_id', 'fk_produto_id')
            ->withPivot('quantidade', 'preco_unitario')
            ->withTimestamps();
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'fk_cliente_id');
    }
}
