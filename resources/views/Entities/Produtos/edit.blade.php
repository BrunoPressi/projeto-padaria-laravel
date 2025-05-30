<x-layouts.app :title="__('Produto Edit')">
    <body>
    <div class="max-w-md mx-auto p-6 bg-black rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-center">Editar Produto</h2>
        <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-white-700">Nome</label>
                <input type="text" id="nome" name="nome" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ $produto->nome }}" required>

                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="preco" class="block text-sm font-medium text-white-700">Preço</label>
                <input type="text" id="preco" name="preco" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ $produto->preco }}" required>

                @error('preco')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="peso" class="block text-sm font-medium text-white-700">Peso</label>
                <input type="number" id="peso" name="peso" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ $produto->peso }}" required>

                @error('peso')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="dataFabricacao" class="block text-sm font-medium text-white-700">Data Fabricação</label>
                <input type="date" id="data_fabricacao" name="data_fabricacao" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ $produto->data_fabricacao }}" readonly>

                @error('dataFabricacao')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="dataVencimento" class="block text-sm font-medium text-white-700">Data Vencimento</label>
                <input type="date" id="data_vencimento" name="data_vencimento" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ $produto->data_vencimento }}" readonly>

                @error('dataVencimento')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="quantidade_estoque" class="block text-sm font-medium text-white-700">Quantidade</label>
                <input type="number" id="quantidade" name="quantidade_estoque" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ $produto->quantidade_estoque }}" required>

                @error('quantidade')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit" class="w-full bg-indigo-500 text-white p-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">Enviar</button>
            </div>

        </form>
    </div>

    </body>
</x-layouts.app>