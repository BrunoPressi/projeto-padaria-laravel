<x-layouts.app :title="__('Produtos Show')">
    <h1 class="flex justify-center mb-4">Produto</h1>
    <div class="overflow-x-auto flex justify-center">
        <table class="min-w-full divide-y divide-gray-200 bg-black shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peso</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data de Vencimento</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Fabricação</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantidade em Estoque</th>
                </tr>
            </thead>
            <tbody class="bg-black divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $produto-> nome }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $produto->preco }} R$</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $produto-> peso }} gramas</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $produto-> quantidade_estoque }} unidades</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $produto-> data_vencimento }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $produto-> data_fabricacao }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-4">
        <a href="{{ route('produtos.create') }}" class="btn btn-secondary text-blue-600">Novo Produto</a>
        <a class="pl-7 btn btn-secondary text-green-600" href="{{ route('produtos.index') }}">Listar Produtos</a>
    </div>
</x-layouts.app>