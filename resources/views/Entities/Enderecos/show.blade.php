<x-layouts.app :title="__('Endereco Show')">
    <h1 class="flex justify-center mb-4">Endereço</h1>
    <div class="overflow-x-auto flex justify-center">
        <table class="min-w-full divide-y divide-gray-200 bg-black shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rua</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Número</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bairro</th>
                </tr>
            </thead>
            <tbody class="bg-black divide-y divide-gray-200">
                @foreach ($enderecos as $endereco)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $endereco->numero }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $endereco->rua }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $endereco->bairro }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            <form action="{{ route('enderecos.edit', $endereco->id) }}" method="GET" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-blue-600 hover:underline">Editar</button>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                            <form action="{{ route('enderecos.destroy', $endereco->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                            </form>
                        </td>  
                    </tr>
                @endforeach

                @if($enderecos->isEmpty())
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">Nenhum endereço encontrado.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-4">
        <div class="flex justify-center">
            <a href="{{ url()->previous() }}" class="btn btn-secondary text-blue-600">Voltar</a>
        </div>
        <div class="flex justify-center ml-4">
            <a href="{{ route('enderecos.create', $cliente->id) }}" class="btn btn-secondary text-blue-600">Novo Endereço</a>
        </div>
    </div>
</x-layouts.app>