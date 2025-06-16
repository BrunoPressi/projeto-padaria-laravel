<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Models\Cliente;

class EnderecosController extends Controller
{

    public function show($id) {
        $cliente = Cliente::findOrFail($id);
        $enderecos = $cliente->enderecos()->get();

        return view('entities.enderecos.show', compact('enderecos', 'cliente'));
    }

    public function create($id) {
        $cliente = Cliente::findOrFail($id);
        return view('entities.enderecos.create', compact('cliente'));
    }

    public function store(Request $request) {

       $validated = $request->validate([
            'rua' => 'required|string|max:30|min:5',
            'numero' => 'required|integer',
            'bairro' => 'required|string|max:30|min:5',
        ], [
            'rua.required' => 'O campo rua é obrigatório.',
            'rua.string' => 'O campo rua deve ser uma string.',
            'rua.min' => 'O campo rua deve ter no mínimo 5 caracteres.',
            'rua.max' => 'O campo rua não pode ter mais que 30 caracteres.',

            'numero.required' => 'O campo número é obrigatório.',
            'numero.integer' => 'O campo número deve ser um número inteiro.', 

            'bairro.required' => 'O campo bairro é obrigatório.',
            'bairro.string' => 'O campo bairro deve ser uma string.',
            'bairro.min' => 'O campo bairro deve ter no mínimo 5 caracteres.',
            'bairro.max' => 'O campo bairro não pode ter mais que 30 caracteres.',
        ]);

        $validated['fk_cliente_id'] = $request->fk_cliente_id;

        Endereco::create($validated);
        return redirect()->route('clientes.index');
    }

    public function edit(string $id) {
        $endereco = Endereco::findOrFail($id);
        return view('entities.enderecos.edit', compact('endereco'));
    }

    public function update(Request $request, string $id) {

        $validated = $request->validate([
            'rua' => 'required|string|max:30|min:5',
            'numero' => 'required|integer',
            'bairro' => 'required|string|max:30|min:5',
        ], [
            'rua.required' => 'O campo rua é obrigatório.',
            'rua.string' => 'O campo rua deve ser uma string.',
            'rua.min' => 'O campo rua deve ter no mínimo 5 caracteres.',
            'rua.max' => 'O campo rua não pode ter mais que 30 caracteres.',

            'numero.required' => 'O campo número é obrigatório.',
            'numero.integer' => 'O campo número deve ser um número inteiro.', 

            'bairro.required' => 'O campo bairro é obrigatório.',
            'bairro.string' => 'O campo bairro deve ser uma string.',
            'bairro.min' => 'O campo bairro deve ter no mínimo 5 caracteres.',
            'bairro.max' => 'O campo bairro não pode ter mais que 30 caracteres.',
        ]);

        $endereco = Endereco::findOrFail($id);
        $endereco->update($validated);

        return redirect()
            ->route('clientes.index', $endereco->id);
    }

    public function destroy(string $id){
        $endereco = Endereco::findOrFail($id);

        $endereco->delete();

        return redirect()
            ->route('clientes.index');
            //->with('success', 'Endereço excluído com sucesso!');
    }

}
