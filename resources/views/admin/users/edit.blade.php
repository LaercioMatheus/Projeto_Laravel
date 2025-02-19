@extends('admin.layouts.app')

@section('title', 'Alterar novo Usuário')

@section('content')

    <h1>Alterar Usuário {{ $user->name }}</h1>

<!--  Essa é a parte de mostrar os erro caso tenha algum erro nas informaçẽos dos campos do formulário -->

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


    <form action="{{ route('users.update', $user->id) }}" method="POST">
<!-- Esse é o token do formulário, ele compara o token de origem e o de sessão para a validação -->
        @csrf()
        @method('patch')
        
        <input type="text" name="name" placeholder="Informe o Nome..." value="{{ $user->name }}">
        <input type="email" name="email" placeholder="Informe o E-mail..." value="{{ $user->email }}">
        <!-- <input type="password" name="password" placeholder="Informe a sua Senha..."> -->
        <button type="submit">Enviar</button>
        </form>
@endsection