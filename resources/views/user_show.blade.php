@extends('main')

@section('title', 'Show User')

@section('content')

<h2>Show User -- '{{ $user->name }}'</h2>

<form action="{{ route('users.destroy', ['user' =>$user->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">

    <label> Name
        <input type="text" name="name" value="{{ $user->name }}">
    </label>

    <label> E-mail
        <input type="email" name="email" value="{{ $user->email }}">
    </label>

    <button type="submit" class="btn btn-danger">Delete</button>
</form>

<a href="{{ route('users.index') }}">Voltar</a>

@endsection