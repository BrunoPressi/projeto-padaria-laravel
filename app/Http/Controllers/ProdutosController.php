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
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'quantidade_estoque' => 'required|integer|min:1',
            'data_fabricacao' => 'required',
            'data_vencimento' => 'required',
            'peso' => 'required'
        ]);

        $produto = Produtos::create([
            'nome' => $validated['nome'],
            'preco' => $validated['preco'],
            'quantidade_estoque'=> $validated['quantidade_estoque'],
            'data_fabricacao' => $validated['data_fabricacao'],
            'data_vencimento' => $validated['data_vencimento'],
            'peso' => $validated['peso'],
        ]);


        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
       
    }

    public function edit(string $id) {
        $produto = Produtos::findOrFail($id);
        return view('entities.produtos.edit', compact('produto'));
    }

    public function update(Request $request, string $id) {

       $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'quantidade_estoque' => 'required|integer|min:1',
            'data_fabricacao' => 'required',
            'data_vencimento' => 'required',
            'peso' => 'required'
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
