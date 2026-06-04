<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <h1>Adicionar Fornecedor</h1>
    <form action="{{ route('fornecedores.update', $fornecedor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $fornecedor->nome }}" required>
        </div>
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="{{ $fornecedor->telefone }}" required>
        </div>
        <div>
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" value="{{ $fornecedor->cidade }}" required>
        </div>
        <div>
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" value="{{ $fornecedor->estado }}" required>
        </div>

        <button type="submit">Atualizar</button>
</body>
</html>