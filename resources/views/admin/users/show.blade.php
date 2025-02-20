@extends('admin.layouts.app')

@section('title', 'Detalhes do Usuário')

<x-alert/>

@section('content')
    <h1>Detalhes do Usuário</h1>

    <ul>
        <li>--> {{ $user->name }}</li>
        <li>--> {{ $user->email }}</li>
    </ul>

    <form action="{{ route('users.destroy', $user->id) }}" method="post">
        @csrf
        @method('delete');
        <input type="button" value="Deletar Usuário" onclick="this.form.submit()">
    </form>

@endsection
