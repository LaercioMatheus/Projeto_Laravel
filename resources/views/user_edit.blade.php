@extends('main')

@section('content')

<h2>Edit User => '{{ $user->name }}' </h2>

@if (session()->has('message'))
    {{ session()->get('message') }}

@endif

<hr>

<form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PATCH">

    <label for="name"> Name
        <input type="text" name="name" id="name" value="{{ $user->name }}">
    </label>

    <label for="email"> E-mail
        <input type="email" name="email" id="email" value="{{ $user->email }}">
    </label>

    <button type="submit" class="btn btn-outline-primary">Enviar</button>
</form>

<a href="{{ route('users.index') }}">Voltar</a>

@endsection