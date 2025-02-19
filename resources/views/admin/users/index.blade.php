    @extends('admin.layouts.app')

    @section('title', 'Listagem de Usuários')

    @section('content')
    <!-- Aqui nesse arquivo só mostra dados não preciso implementar nenhuma logica -->
    <h1>Usuários</h1>

    <!-- Não é uma boa forma colocar no 'sorce' do link o caminho direto pode ser que o caminho mude e ficará difícil alterar depois -->
    <a href="{{ route('users.create') }}">Novo Usuário</a>

    <!-- Mostrando uma mensagem de sucesso quando o usuário for cadastrado com sucesso -->
    @if(session()->has('success'))
        {{ session('success') }}
    @endif

    <br>
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
            <!-- Isso abaixo é uma array que pega todos os dados do banco -->
            <!-- Essa função é igual a 'if else' faz o loop normal, mas se não encontrar informações no $users vai cair no 'empty' -->
            <!-- Evita um 'if else' -->
            @forelse ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <!-- Mandando o usuário para a rota 'edit' mandando junto o id do usuário -->
                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="80">Nenhum usuário no banco de dados</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <p class="paginate">{{ $users->links() }}</p>

    @endsection
    </body>

    </html>