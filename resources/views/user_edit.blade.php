@extends('main')

@section('title', 'Edit User')

@section('content')

<div class="container">
    <h2> Edit User - <strong>{{ $user->name }}</strong> </h2>

    <!-- Mostrando os alertas por meio de components -->
    <x-alert />

    <hr>

    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post" class="row g-3">
        @csrf
        <input type="hidden" name="_method" value="PATCH">

        <div class="col-md-6">
            <label for="name" class="form-label"> Name </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label"> E-mail </label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>

    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary mt-3">Voltar</a>
</div>

@endsection