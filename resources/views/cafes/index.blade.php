@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-semibold text-gray-800">Cafés</h1>
                <a href="{{ route('cafes.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Adicionar Café
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3">Id</th>
                            <th class="p-3">Categoria</th>
                            <th class="p-3">Nome</th>
                            <th class="p-3">Descrição</th>
                            <th class="p-3">Torra</th>
                            <th class="p-3">Preço/kg</th>
                            <th class="p-3">Estoque</th>
                            <th class="p-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cafes as $cafe)
                            <tr class="border-t">
                                <td class="p-3">{{ $cafe->id }}</td>
                                <td class="p-3">{{ $cafe->categoria->nome }}</td>
                                <td class="p-3">{{ $cafe->nome }}</td>
                                <td class="p-3">{{ $cafe->descricao }}</td>
                                <td class="p-3 capitalize">{{ $cafe->torra }}</td>
                                <td class="p-3">R$ {{ number_format($cafe->preco_por_kg, 2, ',', '.') }}</td>
                                <td class="p-3">{{ number_format($cafe->estoque_kg, 2, ',', '.') }} kg</td>
                                <td class="p-3 flex gap-2">
                                    <a href="{{ route('cafes.edit', $cafe->id) }}"
                                        class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                                        Editar
                                    </a>
                                    <form action="{{ route('cafes.destroy', $cafe->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Tem certeza que deseja excluir este café?')"
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