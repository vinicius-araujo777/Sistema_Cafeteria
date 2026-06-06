@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Editar Café</h1>

            <form action="{{ route('cafes.update', $cafe->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoria</label>
                    <select name="categoria_id" id="categoria_id" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Selecione uma categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $cafe->categoria_id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{ $cafe->nome }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                    <input type="text" name="descricao" id="descricao" value="{{ $cafe->descricao }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label for="torra" class="block text-sm font-medium text-gray-700">Torra</label>
                    <select name="torra" id="torra" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="clara" {{ $cafe->torra == 'clara' ? 'selected' : '' }}>Clara</option>
                        <option value="media" {{ $cafe->torra == 'media' ? 'selected' : '' }}>Média</option>
                        <option value="escura" {{ $cafe->torra == 'escura' ? 'selected' : '' }}>Escura</option>
                    </select>
                </div>
                <div>
                    <label for="preco_por_kg" class="block text-sm font-medium text-gray-700">Preço por kg</label>
                    <input type="number" name="preco_por_kg" id="preco_por_kg" step="0.01" min="0" value="{{ $cafe->preco_por_kg }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label for="estoque_kg" class="block text-sm font-medium text-gray-700">Estoque (kg)</label>
                    <input type="number" name="estoque_kg" id="estoque_kg" step="0.01" min="0" value="{{ $cafe->estoque_kg }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="flex gap-3">
                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Atualizar Café
                    </button>
                    <a href="{{ route('cafes.index') }}"
                        class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
                        Cancelar
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection