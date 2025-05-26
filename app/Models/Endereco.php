<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';
    protected $fillable = ['numero', 'rua', 'bairro', 'fk_cliente_id'];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'fk_cliente_id');
    }
}
