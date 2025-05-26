<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Models\Cliente;

class EnderecosController extends Controller
{

    public function show($id) {
        $cliente = Cliente::findOrFail($id);
        $enderecos = $cliente->endereco()->get();

        return view('entities.enderecos.show', compact('enderecos', 'cliente'));
    }

    public function create($id) {
        $cliente = Cliente::findOrFail($id);
        return view('entities.enderecos.create', compact('cliente'));
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'rua' => 'required|string|max:30',
            'numero' => 'required|',
            'bairro' => 'required|string|max:30',
            'fk_cliente_id' => 'required'
        ]);

        Endereco::create($validated);
        return redirect()->route('clientes.index');
    }

    public function edit(string $id) {
        $endereco = Endereco::findOrFail($id);
        return view('entities.enderecos.edit', compact('endereco'));
    }

    public function update(Request $request, string $id) {

        $validated = $request->validate([
            'rua' => 'required|string|max:30',
            'numero' => 'required|',
            'bairro' => 'required|string|max:30',
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
