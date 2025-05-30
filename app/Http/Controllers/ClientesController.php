<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{

    public function create() {
        return view('entities.clientes.create');
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|digits:11|unique:clientes,cpf',
            'telefone' => 'required|string|max:11',
        ]);

        Cliente::create($validated);
        return redirect()->route('clientes.index');
    }

    public function edit(string $id) {
        $cliente = Cliente::findOrFail($id);
        return view('entities.clientes.edit', compact('cliente'));
    }

    public function update(Request $request, string $id) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|digits:11|unique:clientes,cpf,' . $id,
            'telefone' => 'required|string|max:11',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($validated);

        return redirect()
            ->route('clientes.show', $cliente->id);
            //->with('success', 'Cliente atualizada com sucesso!');
    }

    public function show($id){
        $cliente = Cliente::findOrFail($id);
        return view('entities.clientes.show', compact('cliente'));
    }

    public function index() {
        $clientes = Cliente::all();
        
        return view('entities.clientes.index', compact('clientes'));
    }

    public function destroy(string $id){
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        return redirect()
            ->route('clientes.index');
            //->with('success', 'Disciplina excluída com sucesso!');
    }
}
