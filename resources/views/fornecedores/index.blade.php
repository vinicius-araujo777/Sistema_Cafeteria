@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-semibold text-gray-800">Fornecedores</h1>
                <a href="{{ route('fornecedores.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Adicionar Fornecedor
                </a>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3">Id</th>
                            <th class="p-3">Nome</th>
                            <th class="p-3">Telefone</th>
                            <th class="p-3">Cidade</th>
                            <th class="p-3">Estado</th>
                            <th class="p-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr class="border-t">
                                <td class="p-3">{{ $fornecedor->id }}</td>
                                <td class="p-3">{{ $fornecedor->nome }}</td>
                                <td class="p-3">{{ $fornecedor->telefone }}</td>
                                <td class="p-3">{{ $fornecedor->cidade }}</td>
                                <td class="p-3">{{ $fornecedor->estado }}</td>
                                <td class="p-3 flex gap-2">
                                    <a href="{{ route('fornecedores.edit', $fornecedor->id) }}"
                                    class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                                        Editar
                                    </a>
                                    <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Tem certeza que deseja excluir este fornecedor?')"
                                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection