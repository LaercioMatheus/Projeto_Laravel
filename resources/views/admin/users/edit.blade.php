@extends('admin.layouts.app')

@section('title', 'Alterar novo Usuário')

@section('content')
    <h1>Alterar Usuário {{ $user->name }}</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        <!-- Esse é o método de validação para converter o método 'GET' para o método 'PATCH' -->
        @method('patch')
        @include('admin.users.partials.form')
    </form>
@endsection