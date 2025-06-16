<x-layouts.app :title="__('Novo Endereço')">
    <body>
    <div class="max-w-md mx-auto p-6 bg-black rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-center">Novo Endereço</h2>
        <form action="{{ route('enderecos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="rua" class="block text-sm font-medium text-white-700">Rua</label>
                <input type="text" id="rua" name="rua" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>

                @error('rua')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="numero" class="block text-sm font-medium text-white-700">Número</label>
                <input type="text" id="numero" name="numero" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>

                @error('numero')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="bairro" class="block text-sm font-medium text-white-700">Bairro</label>
                <input type="text" id="bairro" name="bairro" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>

                @error('bairro')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <input type="hidden" id="fk_cliente_id" name="fk_cliente_id" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ $cliente->id }}" required>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="w-full bg-indigo-500 text-white p-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">Enviar</button>
            </div>

        </form>
    </div>

    </body>
</x-layouts.app>