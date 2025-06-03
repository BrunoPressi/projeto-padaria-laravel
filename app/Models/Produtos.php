<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'preco', 'peso', 'quantidade_estoque', 'data_vencimento', 'data_fabricacao'];

    public function vendas() {
        return $this->belongsToMany(Vendas::class, 'itens_vendas')
            ->withPivot('quantidade', 'preco_unitario')
            ->withTimestamps();
    }
}
