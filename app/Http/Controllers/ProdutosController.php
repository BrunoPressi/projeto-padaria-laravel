<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produtos;

class ProdutosController extends Controller
{
    public function create() {
        return view('entities.produtos.create');
    }

    public function index() {
        $produtos = Produtos::all();

        return view('entities.produtos.index', compact('produtos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255|min:3|regex:/^[A-Za-zÀ-ÿ\s]+$/u',
            'preco' => 'required|numeric|min:0.01',
            'quantidade_estoque' => 'required|integer|min:0',
            'data_fabricacao' => 'required|date',
            'data_vencimento' => 'required|date|after:data_fabricacao',
            'peso' => 'required|numeric|min:0.01',
        ], [
            'nome.required' => 'O nome do produto é obrigatório.',
            'nome.regex' => 'O nome do produto deve ser uma string.',
            'nome.min' => 'O nome do produto deve ter no mínimo :min caracteres.',
            'nome.max' => 'O nome do produto deve ter no máximo :max caracteres.',

            'preco.required' => 'O preço é obrigatório.',
            'preco.numeric' => 'O preço deve ser um número.',
            'preco.min' => 'O preço deve ser no mínimo R$ :min.',

            'quantidade_estoque.required' => 'A quantidade em estoque é obrigatória.',
            'quantidade_estoque.integer' => 'A quantidade em estoque deve ser um número inteiro.',
            'quantidade_estoque.min' => 'A quantidade em estoque não pode ser negativa.',

            'data_fabricacao.required' => 'A data de fabricação é obrigatória.',
            'data_fabricacao.date' => 'A data de fabricação deve ser uma data válida.',

            'data_vencimento.required' => 'A data de vencimento é obrigatória.',
            'data_vencimento.date' => 'A data de vencimento deve ser uma data válida.',
            'data_vencimento.after' => 'A data de vencimento deve ser posterior à data de fabricação.',

            'peso.required' => 'O peso é obrigatório.',
            'peso.numeric' => 'O peso deve ser um número.',
            'peso.min' => 'O peso deve ser maior que zero.',
        ]);


        Produtos::create($validated);

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit(string $id) {
        $produto = Produtos::findOrFail($id);
        return view('entities.produtos.edit', compact('produto'));
    }

    public function update(Request $request, string $id) {

        $validated = $request->validate([
            'nome' => 'required|string|max:255|min:3|regex:/^[A-Za-zÀ-ÿ\s]+$/u',
            'preco' => 'required|numeric|min:0.01',
            'quantidade_estoque' => 'required|integer|min:0',
            'data_fabricacao' => 'required|date',
            'data_vencimento' => 'required|date|after:data_fabricacao',
            'peso' => 'required|numeric|min:0.01',
        ], [
            'nome.required' => 'O nome do produto é obrigatório.',
            'nome.regex' => 'O nome do produto deve ser uma string.',
            'nome.min' => 'O nome do produto deve ter no mínimo :min caracteres.',
            'nome.max' => 'O nome do produto deve ter no máximo :max caracteres.',

            'preco.required' => 'O preço é obrigatório.',
            'preco.numeric' => 'O preço deve ser um número.',
            'preco.min' => 'O preço deve ser no mínimo R$ :min.',

            'quantidade_estoque.required' => 'A quantidade em estoque é obrigatória.',
            'quantidade_estoque.integer' => 'A quantidade em estoque deve ser um número inteiro.',
            'quantidade_estoque.min' => 'A quantidade em estoque não pode ser negativa.',

            'data_fabricacao.required' => 'A data de fabricação é obrigatória.',
            'data_fabricacao.date' => 'A data de fabricação deve ser uma data válida.',

            'data_vencimento.required' => 'A data de vencimento é obrigatória.',
            'data_vencimento.date' => 'A data de vencimento deve ser uma data válida.',
            'data_vencimento.after' => 'A data de vencimento deve ser posterior à data de fabricação.',

            'peso.required' => 'O peso é obrigatório.',
            'peso.numeric' => 'O peso deve ser um número.',
            'peso.min' => 'O peso deve ser maior que zero.',
        ]);

        $produto = Produtos::findOrFail($id);
        $produto->update($validated);

        return redirect()
            ->route('produtos.index');
    }

    public function destroy(string $id){
        $produtos = Produtos::findOrFail($id);

        $produtos->delete();

        return redirect()
            ->route('produtos.index');
    }

    public function show($id){
        $produto = Produtos::findOrFail($id);

        return view('entities.produtos.show', compact('produto'));
    }

}
