    @extends('admin.layouts.app')

    @section('title', 'Listagem de Usuários')

    @section('content')
    <!-- Aqui nesse arquivo só mostra dados não preciso implementar nenhuma logica -->

   
    @include('admin.users.partials.breacrumb')
    
    <x-alert />

    <!-- Não é uma boa forma colocar no 'sorce' do link o caminho direto pode ser que o caminho mude e ficará difícil alterar depois -->
    <div class="flex justify-between">
        <caption class="caption-top">Os dados dos usuários do banco de dados</caption>
        <a class="btn btn-primary" href="{{ route('users.create') }}" class="">Novo Usuário</a>
    </div>

    
    <div class="py-6 align-items-lg-center align-items-xxl-baseline">
        <table class="table-fixed w-100">
            <thead> <!-- class="text-gray-500 dark:text-gray-100" -->
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
                        <a href="{{ route('users.show', $user->id) }}">Details</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="80">Nenhum usuário no banco de dados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="paginate">{{ $users->links() }}</div>

    @endsection