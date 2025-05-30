<x-layouts.app :title="__('Produtos Index')">
    <h1 class="flex justify-center mb-4">Produtos</h1>
    <div class="overflow-x-auto flex justify-center">
        <table class="min-w-full divide-y divide-gray-200 bg-black shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peso</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantidade em Estoque</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Vencimento</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Fabricação</th>

                </tr>
            </thead>
            <tbody class="bg-black divide-y divide-gray-200">
                @foreach ($produtos as $produto)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $produto -> nome }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $produto->preco }} R$</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $produto-> peso }} gramas</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $produto-> quantidade_estoque }} unidades</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $produto-> data_vencimento }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $produto-> data_fabricacao }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            <form action="{{ route('produtos.edit', $produto->id) }}" method="GET" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-blue-600 hover:underline">Editar</button>
                            </form>
                        </td>   
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            <form action="{{ route('produtos.show', $produto->id) }}" method="GET" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-green-600 hover:underline">Ver</button>
                            </form>
                        </td>   
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                            </form>
                        </td>   
                    </tr>
                @endforeach    
            </tbody>

            @if($produtos->isEmpty())
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">Nenhum cliente encontrado.</td>
                </tr>
            @endif
        </table>
    </div>
    <div class="flex justify-center mt-4">
        <a href="{{ route('produtos.create') }}" class="btn btn-secondary text-blue-600">Novo Produto</a>
    </div>
</x-layouts.app>