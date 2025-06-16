<x-layouts.app :title="__('Cliente')">
    <h1 class="flex justify-center mb-4">Cliente</h1>
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
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $cliente->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $cliente->cpf }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $cliente->telefone }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                        <form action="{{ route('enderecos.show', $cliente->id) }}" method="GET" style="display:inline;">
                            @csrf
                            <button type="submit" class="text-yellow-600 hover:underline">Ver endereço</button>
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
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-4">
        <a href="{{ route('clientes.create') }}" class="btn btn-secondary text-blue-600">Novo Cliente</a>
        <a class="pl-7 btn btn-secondary text-green-600" href="{{ route('clientes.index') }}">Listar Clientes</a>
    </div>
</x-layouts.app>