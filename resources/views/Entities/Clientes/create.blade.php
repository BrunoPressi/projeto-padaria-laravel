<x-layouts.app :title="__('Novo Cliente')">
    <body>
    <div class="max-w-md mx-auto p-6 bg-black rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-center">Adicionar novo cliente</h2>
        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-white-700">Nome</label>
                <input type="text" id="name" name="name" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>

                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="cpf" class="block text-sm font-medium text-white-700">CPF</label>
                <input type="text" id="cpf" name="cpf" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>

                @error('cpf')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="telefone" class="block text-sm font-medium text-white-700">Telefone</label>
                <input type="text" id="telefone" name="telefone" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>

                @error('telefone')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit" class="w-full bg-indigo-500 text-white p-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">Salvar</button>
            </div>

        </form>
    </div>

    </body>
</x-layouts.app>