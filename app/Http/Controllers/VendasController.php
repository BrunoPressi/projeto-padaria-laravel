<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Models\Vendas;
use App\Models\itens_vendas;
use App\Models\Cliente;

class VendasController extends Controller
{
    public function create() {
        $produtos = Produtos::all();
        $clientes = Cliente::all();
        return view('entities.vendas.create', compact('produtos', 'clientes'));
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'data_venda' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id',
            'produtos' => 'required|array',
            'produtos.*.id' => 'required|exists:produtos,id',
            'produtos.*.quantidade' => 'required|integer|min:1',
            'produtos.*.preco_unitario' => 'required|numeric|min:0',
            'produtos.*.desconto' => 'nullable|numeric|min:0',
        ]);

        $quantidadeItens = 0;
        $precoTotal = 0;

        foreach ($request->produtos as $item) {

            $produto = Produtos::findOrFail($item['id']);

            $quantidadeItens += $item['quantidade'];
            $precoTotal += $item['preco_unitario'] * $item['quantidade'];

            if ($item['quantidade'] > $produto->quantidade_estoque) {
                return back()->withErrors([
                    'produtos' => "O produto {$produto->nome} tem apenas {$produto->quantidade_estoque} unidades em estoque."
                ]);
            }

            $produto->quantidade_estoque -= $item['quantidade'];

            $produto->save();
        }

        $venda = Vendas::create([
            'data_venda' => $validated['data_venda'],
            'fk_cliente_id' => $validated['cliente_id'],
            'quantidade_itens' => $quantidadeItens,
            'preco_total' => $precoTotal
        ]);
    

        foreach ($validated['produtos'] as $item) {
            itens_vendas::create([
                'fk_vendas_id' => $venda->id,
                'fk_produto_id' => $item['id'],
                'quantidade' => $item['quantidade'],
                'preco_unitario' => $item['preco_unitario'],
            ]);
        }

        return redirect()->route('vendas.index')->with('success', 'Venda cadastrada com sucesso!');
    }

    public function index() {
        $vendas = Vendas::with(['produtos', 'cliente'])->get();
        return view('entities.vendas.index', compact('vendas'));
    }
}
