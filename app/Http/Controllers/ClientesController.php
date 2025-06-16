<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Rules\Cpf;

class ClientesController extends Controller
{

    public function create() {
        return view('entities.clientes.create');
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'cpf' => ['required', 'unique:clientes,cpf', new Cpf],
            'telefone' => 'required|string|min:11|max:11',
        ], [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser uma string.',
            'name.min' => 'O nome deve ter no mínimo 3 caracteres.',
            'name.max' => 'O nome deve ter no máximo 255 caracteres.',

            'cpf.unique' => "O cpf informado já está cadastrado.",

            'telefone.required' => 'O telefone é obrigatório.',
            'telefone.string' => 'O telefone deve ser uma string.',
            'telefone.min' => 'O telefone deve ter exatamente 11 caracteres.',
            'telefone.max' => 'O telefone deve ter exatamente 11 caracteres.',
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
            'name' => 'required|string|max:255|min:3',
            'telefone' => 'required|string|min:11|max:11',
        ], [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser uma string.',
            'name.min' => 'O nome deve ter no mínimo 3 caracteres.',
            'name.max' => 'O nome deve ter no máximo 255 caracteres.',

            'telefone.required' => 'O telefone é obrigatório.',
            'telefone.string' => 'O telefone deve ser uma string.',
            'telefone.min' => 'O telefone deve ter exatamente 11 caracteres.',
            'telefone.max' => 'O telefone deve ter exatamente 11 caracteres.',
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
        $cliente = Cliente::with('enderecos')->find($id);

        $cliente->enderecos()->delete();
        $cliente->delete();

        return redirect()
            ->route('clientes.index');
            //->with('success', 'Disciplina excluída com sucesso!');
    }
}
