@extends('layouts.app')

@section('title', 'Users')

@section('content')

    <div class="d-flex justify-content-between">
        <h2 class="title">List Users</h2>
        <a href="{{ route('users.create') }}" class="btn_button_shadow_border--black mt-3">New Users</a>
    </div>
    <hr class="border-group-divider border-2 opacity-75">

    <!-- Mostrando os alertas por meio de components-->
    <!-- Posso usar o include passando o nome do arquivo-->
    <x-alert />

    <div class="container_table">
        <table class="table table-hover table-responsive">
            <thead class="col text-center justify-center">
                <th>Name</th>
                <!-- <th>E-mail</th> -->
                <th>Action</th>
            </thead>
            @forelse ($users as $user)
            <tbody>
                <!-- Name -->
                <td>{{ $user->name }} </td>
                <!-- Actions -->
                <td class="col text-center">
                    <div class="btn_group gap-3">
                        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="css_button_3d--blue">Show</a>
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="css_button_3d--yellow">Edit</a>
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
        {{ $users->links() }}
    </div>

@endsection