<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Aqui nesse arquivo só mostra dados não preciso implementar nenhuma logica -->
    <h1>Usuários</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

<!-- Lista todos os usuários no banco de dado -->
<!-- Essa função é igual a 'if else' faz o loop normal, mas se não encontrar informações no banco vai cair no 'empty' -->
<!-- Evita um 'if else' -->
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>--</td>
                </tr>

            @empty
                <tr>
                    <td colspan="80">Nenhum usuário no banco de dados</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p class="paginate">{{ $users->links() }}</p>
</body>
</html>