<x-layouts.app :title="__('Cadastrar Venda')">

    <div class="max-w-2xl mx-auto p-6 bg-black rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-center text-white">Cadastrar Venda</h2>

        <form action="{{ route('vendas.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="data_venda" class="block text-sm font-medium text-white">Data da Venda:</label>
                <input type="datetime-local" name="data_venda" id="data_venda" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>
    
            <div class="mb-4">
                <label for="cliente_id" class="block text-sm font-medium text-white">Cliente:</label>
                <select id="cliente_id" name="cliente_id" 
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-900 text-white" 
                    required>
                    <option value="">Selecione um cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                    @endforeach
                </select>
            </div>

            <h4 class="text-lg font-semibold text-white mb-2">Produtos:</h4>
            <div id="produtos-container">
                <div class="produto-item mb-4 space-y-2">
                    <select name="produtos[0][id]" class="w-full p-2 border border-gray-300 rounded-md" required>
                        <option value="">Selecione um produto</option>
                        @foreach ($produtos as $produto)
                            <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                        @endforeach
                    </select>

                    <input type="number" name="produtos[0][quantidade]" placeholder="Quantidade" min="1" required
                        class="w-full p-2 border border-gray-300 rounded-md">
                    <input type="number" name="produtos[0][preco_unitario]" placeholder="Preço Unitário" step="0.01" required
                        class="w-full p-2 border border-gray-300 rounded-md">
                </div>
            </div>

            <div class="flex justify-end mb-4">
                <button type="button" onclick="addProduto()"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Adicionar Produto</button>
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="w-full bg-indigo-500 text-white p-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">Salvar Venda</button>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>

    <script>
        let index = 1;
        function addProduto() {
            const container = document.getElementById('produtos-container');
            const div = document.createElement('div');
            div.classList.add('produto-item', 'mb-4', 'space-y-2');
            div.innerHTML = `
                <select name="produtos[${index}][id]" class="w-full p-2 border border-gray-300 rounded-md" required>
                    <option value="">Selecione um produto</option>
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                </select>
                <input type="number" name="produtos[${index}][quantidade]" placeholder="Quantidade" min="1" required
                    class="w-full p-2 border border-gray-300 rounded-md">
                <input type="number" name="produtos[${index}][preco_unitario]" placeholder="Preço Unitário" step="0.01" required
                    class="w-full p-2 border border-gray-300 rounded-md">
            `;
            container.appendChild(div);
            index++;
        }
    </script>

</x-layouts.app>
