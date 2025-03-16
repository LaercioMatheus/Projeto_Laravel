@extends('main')

@section('title', 'Edit User')

@section('content')

    <h2> Edit User - <strong>{{ $user->name }}</strong> </h2>

    <!-- Mostrando os alertas por meio de components -->
    <x-alert />

    <hr>

    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post" class="needs-validation row g-3" novalidate>
        @csrf
        <input type="hidden" name="_method" value="PATCH">

        <div class="col-md-6">
            <label for="name" class="form-label"> Name </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            <div class="invalid-feedback">
                Name Required
            </div>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label"> Email </label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            <div class="invalid-feedback">
                Email Required
            </div>
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-success m-3">Enviar</button>
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary m-1">Voltar</a>
        </div>
    </form>


@endsection