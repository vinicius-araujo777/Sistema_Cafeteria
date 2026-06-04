<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <h1>Fornecedores</h1>
    <a href="{{ route('fornecedores.create') }}">Adicionar Fornecedor</a>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Cidade</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fornecedores as $fornecedor)
                <tr>
                    <td>{{ $fornecedor->id }}</td>
                    <td>{{ $fornecedor->nome }}</td>
                    <td>{{ $fornecedor->telefone }}</td>
                    <td>{{ $fornecedor->cidade }}</td>
                    <td>{{ $fornecedor->estado }}</td>
                    <td>
                        <a href="{{ route('fornecedores.edit', $fornecedor->id) }}">Editar</a>
                        <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este fornecedor?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
