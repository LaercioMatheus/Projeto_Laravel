@extends('main')

@section('content')


<h2>List Users</h2>

@if (session()->has('message'))
    {{ session()->get('message') }}

@endif

<hr>

<a href="{{ route('users.create') }}" class="btn btn-outline-success">Create Users</a>


<ol>
    @foreach ($users as $user)

    <li>{{ $user->name }} ==>
        <a href="{{ route('users.show', ['user' => $user->id]) }}">Show</a> |
        <a href="{{ route('users.edit', ['user' => $user->id]) }}">Edit</a>
    </li>

    @endforeach
</ol>

@endsection