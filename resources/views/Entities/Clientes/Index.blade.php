<x-layouts.app :title="__('Lista de Clientes')">
    <h1 class="flex justify-center mb-4">Clientes</h1>
    <div class="overflow-x-auto flex justify-center">
        <table class="min-w-full divide-y divide-gray-200 bg-black shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CPF</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telefone</th>
                </tr>
            </thead>
            <tbody class="bg-black divide-y divide-gray-200">
                @foreach ($clientes as $cliente)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $cliente->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $cliente->cpf }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $cliente->telefone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            <form action="{{ route('enderecos.show', $cliente->id) }}" method="GET" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-yellow-600 hover:underline">Endereços</button>
                            </form>
                        </td> 
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            <form action="{{ route('clientes.show', $cliente->id) }}" method="GET" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-green-600 hover:underline">Ver</button>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            <form action="{{ route('clientes.edit', $cliente->id) }}" method="GET" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-blue-600 hover:underline">Editar</button>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                            </form>
                        </td>   
                    </tr>
                @endforeach

                @if($clientes->isEmpty())
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">Nenhum cliente encontrado.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-4">
        <a href="{{ route('clientes.create') }}" class="btn btn-secondary text-blue-600">Novo Cliente</a>
    </div>
</x-layouts.app>