@extends('main')

@section('content')

<h2>Create Users</h2>

@if (session()->has('message'))
    {{ session()->get('message') }}

@endif

<hr>

<form action="{{ route('users.store') }}" method="post">

    <!-- Sempre quando eu trabalhar como formulários tenho que colocar o cross file (@csrf) -->
    @csrf

    <label for="name">Name</label>
    <input type="text" name="name" id="name" placeholder="Your name...">

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" placeholder="Your e-mail...">

    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Your password...">

    <button type="submit" class="btn btn-outline-success">Enviar</button>
</form>

<a href="{{ route('users.index') }}">Voltar</a>

@endsection