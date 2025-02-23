@extends('admin.layouts.app')

@section('title', 'Detalhes do Usuário')

<x-alert/>

@section('content')
    <h1>Detalhes do Usuário</h1>

    <ul>
        <li>Nome: {{ $user->name }}</li>
        <li>E-mail: {{ $user->email }}</li>
    </ul>
    <br>

    <!-- @can('is-owner', $user)
        <p>Pode deletar esse registro...</p>
    @endcan -->

    <!-- O 'can' serve para a condição de aparecer algo para a condição (no meu caso é para somente o adm) -->
    @can('is-admin')
    <form action="{{ route('users.destroy', $user->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="button" value="Deletar Usuário" onclick="this.form.submit()">
    </form>
    @endcan
    
@endsection
