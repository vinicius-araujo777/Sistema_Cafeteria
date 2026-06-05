<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <h1>index cafes</h1>
    <a href="{{ route('cafes.create') }} "> Adicionar cafe </a>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Categoria</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Torra</th>
                <th>Preço_kg</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cafes as $cafe)
                <tr>
                    <td> {{$cafe->id}} </td>
                    <td> {{$cafe->categoria->nome}} </td>
                    <td> {{$cafe->nome}} </td>
                    <td> {{$cafe->descricao}} </td>
                    <td> {{$cafe->torra}} </td>
                    <td> R$ {{ number_format($cafe->preco_por_kg, 2, ',', '.') }} </td>
                    <td> {{ number_format($cafe->estoque_kg, 2, ',', '.') }} kg </td>
                    <td>
                        <a href="{{ route('cafes.edit', $cafe->id) }}">Editar</a>
                        <form action="{{ route('cafes.destroy', $cafe->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este café?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>