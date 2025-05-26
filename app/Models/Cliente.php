<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['name','cpf','telefone', 'fk_endereco_id'];

    public function endereco(){
        return $this->hasMany(Endereco::class, 'fk_cliente_id');
    }
}
