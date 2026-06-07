@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-semibold text-gray-800">Categorias</h1>
                <a href="{{ route('categorias.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Nova Categoria
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3">Id</th>
                            <th class="p-3">Nome</th>
                            <th class="p-3">Descrição</th>
                            <th class="p-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr class="border-t">
                                <td class="p-3">{{ $categoria->id }}</td>
                                <td class="p-3">{{ $categoria->nome }}</td>
                                <td class="p-3">{{ $categoria->descricao }}</td>
                                <td class="p-3 flex gap-2">
                                    <a href="{{ route('categorias.edit', $categoria->id) }}"
                                        class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                                        Editar
                                    </a>
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Tem certeza que deseja excluir esta categoria?')"
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