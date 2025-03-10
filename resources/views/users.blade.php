@extends('layouts.app')

@section('content')

<div class="container">

    <h2>List Users</h2>


    @if (session()->has('message'))
    {{ session()->get('message') }}

    @endif

    <hr>

    <a href="{{ route('users.create') }}" class="btn btn-outline-success">Create Users</a>

    <hr>

    <table class="table table-hover">
        <thead>
            <th>Name</th>
            <!-- <th>E-mail</th> -->
            <th>Action</th>
        </thead>

        @foreach ($users as $user)
        <tbody>
            <!-- Name -->
            <td>{{ $user->name }} </td>

            <!-- Actions -->
            <td>
                <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-dark">Show</a> |
                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-warning">Edit</a>
            </td>
        </tbody>
        @endforeach
    </table>

    <div class="pagination">
    <nav aria-label="navigation-page">
        <ul class="pagination">
            <li class="page-item">{{ $users->links() }}</li>
        </ul>
    </nav>
    </div>
</div>



@endsection