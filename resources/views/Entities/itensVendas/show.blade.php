<x-layouts.app :title="__('Ver Itens da Venda')">
    <h1 class="flex justify-center mb-4">Itens da Venda</h1>
    <div class="overflow-x-auto flex justify-center">
        <table class="min-w-full divide-y divide-gray-200 bg-black shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantidade</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço Unitário</th>
                </tr>
            </thead>
            <tbody class="bg-black divide-y divide-gray-200">
                @foreach ($itens as $iten)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $iten->produto->nome }} </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $iten-> quantidade }} </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $iten-> preco_unitario }} R$</td>
                    </tr>
                @endforeach    
            </tbody>

        </table>
    </div>
    <div class="flex justify-center mt-4">
        <div class="flex justify-center">
            <a href="{{ route('vendas.index') }}" class="btn btn-secondary text-yellow-600">Voltar</a>
        </div>
        <div class="flex justify-center ml-4">
            <a href="{{ route('vendas.create') }}" class="btn btn-secondary text-blue-600">Nova Venda</a>
        </div>
    </div>
</x-layouts.app>