@extends('main')

@section('title', 'Create User')

@section('content')

<h2>Create Users</h2>

@if (session()->has('message'))
    <div class="alert alert-success">{{ session()->get('message') }}</div>
@endif

@if (session()->has('errors'))
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger"> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<hr>

<form action="{{ route('users.store') }}" method="post">

    <!-- Sempre quando eu trabalhar como formulários tenho que colocar o cross file (@csrf) -->
    @csrf

    <label for="name">Name</label>
    <input type="text" name="name" id="name" placeholder="Your name..." value="{{ old('name') }}">

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" placeholder="Your e-mail..." value="{{ old('email') }}">

    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Your password...">

    <button type="submit" class="btn btn-outline-success">Enviar</button>
</form>

<a href="{{ route('users.index') }}">Voltar</a>

@endsection