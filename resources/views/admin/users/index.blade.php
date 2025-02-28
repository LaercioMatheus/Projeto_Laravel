    @extends('admin.layouts.app')
    @section('title', 'List Users')

    @section('content')
    <!-- Aqui nesse arquivo só mostra dados não preciso implementar nenhuma logica -->

    @include('admin.users.partials.breacrumb')

    use Illuminate\Pagination\Paginator;

    public function boot()
    {
        Paginator::useBootstrap(); // Para usar Bootstrap
    }

    <x-alert />

    <!-- Não é uma boa forma colocar no 'sorce' do link o caminho direto pode ser que o caminho mude e ficará difícil alterar depois -->
    <div class="flex-row d-flex justify-content-between">
        <legend class="caption-top">Os dados dos usuários do banco de dados</legend>
        <a class="btn btn-outline-success" href="{{ route('users.create') }}" class="">New User</a>
    </div>

    <div class="py-6 align-items-lg-center align-items-xxl-baseline">

        <table class="table table-fixed w-100">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
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
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-warning">Edit</a>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-secondary">Details</a>
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

    <!-- <div class="custom-pagination">
        <li>
            <div class="active"><span>{{ $users->links() }}</span></div>
        </li>
    </div> -->
    @endsection