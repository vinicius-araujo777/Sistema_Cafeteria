<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <h1>Adicionar Cafe</h1>

    <form action="{{route('cafes.store')}}" method="post">
        @csrf
        <div>
            <label for="categoria_id">Categoria:</label>
            <select name="categoria_id" id="categoria_id" required>
                <option value="">Selecione uma categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </div>

        <div>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao">
        </div>

        <div>
            <label for="torra">Torra:</label>
            <select name="torra" id="torra" required>
                <option value="clara">Clara</option>
                <option value="media">Média</option>
                <option value="escura">Escura</option>
            </select>
        </div>

        <div>
            <label for="preco_por_kg">Preço por kg:</label>
            <input type="number" name="preco_por_kg" id="preco_por_kg" step="0.01" min="0" required>
        </div>

        <div>
            <label for="estoque_kg">Estoque (kg):</label>
            <input type="number" name="estoque_kg" id="estoque_kg" step="0.01" min="0" required>
        </div>

        <button type="submit">Adicionar Cafe</button>
    </form>
</body>
</html>
