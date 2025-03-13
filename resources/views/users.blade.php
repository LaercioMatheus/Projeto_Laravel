@extends('layouts.app')

@section('title', 'Users')

@section('content')

<div class="container">

    <h2>List Users</h2>


    <!-- Mostrando os alertas por meio de components-->
    <!-- Posso usar o include passando o nome do arquivo-->
    <x-alert />

    <hr>

    <a href="{{ route('users.create') }}" class="btn btn-outline-success m-2">Create Users</a>

    <table class="table table-hover">
        <thead>
            <th>Name</th>
            <!-- <th>E-mail</th> -->
            <th>Action</th>
            <tr class="table-group-divider">
        </thead>

        @forelse ($users as $user)
        <tbody>
            <!-- Name -->
            <td>{{ $user->name }} </td>

            <!-- Actions -->
            <td>
                <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-dark">Show</a> |
                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-warning">Edit</a>
            </td>

            @empty
            <tr>
                <td colspan="60">Nenhum usuário encontrado no banco de dados...</td>
            </tr>
        </tbody>
        @endforelse
    </table>

    <div class="pagination">
        <nav aria-label="navigation-page">
            <ul class="pagination">
                <li class="page-item">{{ $users->links() }}</li>
            </ul>
        </nav>
    </div>
</div>

@endsection