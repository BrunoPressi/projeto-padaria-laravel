<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Endereco;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['name','cpf','telefone'];

    public function enderecos(){
        return $this->hasMany(Endereco::class, 'fk_cliente_id');
    }
}
