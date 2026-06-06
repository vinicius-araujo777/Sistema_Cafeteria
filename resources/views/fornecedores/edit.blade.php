@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Editar Fornecedor</h1>

            <form action="{{ route('fornecedores.update', $fornecedor->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input type="text" id="nome" name="nome" value="{{ $fornecedor->nome }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
                    <input type="text" id="telefone" name="telefone" value="{{ $fornecedor->telefone }}" minlength="10" maxlength="11" placeholder="(00) 00000-0000" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label for="cidade" class="block text-sm font-medium text-gray-700">Cidade</label>
                    <input type="text" id="cidade" name="cidade" value="{{ $fornecedor->cidade }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label for="estado" class="block text-sm font-medium text-gray-700">Estado (UF)</label>
                    <input type="text" id="estado" name="estado" value="{{ $fornecedor->estado }}" maxlength="2" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="flex gap-3">
                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Atualizar
                    </button>
                    <a href="{{ route('fornecedores.index') }}"
                        class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
                        Cancelar
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection