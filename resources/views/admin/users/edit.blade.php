@extends('admin.layouts.app')

@section('title', 'Alterar novo Usuário')

@section('content')
    @include('admin.users.partials.breacrumb')

    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Alterar Usuário {{ $user->name }}</h2>
    </div>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        <!-- Esse é o método de validação para converter o método 'GET' para o método 'PATCH' -->
        @method('patch')
        @include('admin.users.partials.form')
    </form>
@endsection