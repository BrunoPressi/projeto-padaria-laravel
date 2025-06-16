<x-layouts.app :title="__('Lista de Vendas')">
    <h1 class="flex justify-center mb-4">Vendas</h1>
    <div class="overflow-x-auto flex justify-center">
        <table class="min-w-full divide-y divide-gray-200 bg-black shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id da Venda</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantidade de Itens</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome do Cliente</th>
                </tr>
            </thead>
            <tbody class="bg-black divide-y divide-gray-200">
                @foreach ($vendas as $venda)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $venda -> id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $venda-> quantidade_itens }} </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $venda-> preco_total }} R$</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $venda-> cliente->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            <form action="{{ route('itens.show', $venda->id) }}" method="GET" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-yellow-600 hover:underline">Ver Itens</button>
                            </form>
                        </td>   
                    </tr>
                @endforeach    
            </tbody>

            @if($vendas->isEmpty())
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">Nenhuma venda encontrada.</td>
                </tr>
            @endif
        </table>
    </div>
    <div class="flex justify-center mt-4">
        <a href="{{ route('vendas.create') }}" class="btn btn-secondary text-blue-600">Nova Venda</a>
    </div>
</x-layouts.app>