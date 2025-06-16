<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\itens_vendas;

class Itens_vendasController extends Controller
{
    public function show($id){
        $itens = itens_vendas::with('produto')->where('fk_vendas_id', $id)->get();

        return view('entities.itensVendas.show', compact('itens'));
    }
}
