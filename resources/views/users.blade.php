@extends('layouts.app')

@section('title', 'Users')

@section('content')

<div class="container">

    <h2 class="title">List Users</h2>

    <!-- Mostrando os alertas por meio de components-->
    <!-- Posso usar o include passando o nome do arquivo-->
    <x-alert />

    <hr>

    <a href="{{ route('users.create') }}" class="btn btn-outline-success m-3">Create Users</a>

    <div class="container_table">
        <table class="table table-dark table-hover table-responsive">
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
                    <div class="div_button d-inline p-2">
                        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-dark">Show</a>
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-warning">Edit</a>
                    </div>
                </td>
                @empty
                <tr>
                    <td colspan="60">Nenhum usuário encontrado no banco de dados...</td>
                </tr>
            </tbody>
            @endforelse
        </table>
    </div>

    <div class="pagination">
        <nav aria-label="navigation-page">
            <ul class="pagination">
                <li class="page-item">{{ $users->links() }}</li>
            </ul>
        </nav>
    </div>
</div>

@endsection