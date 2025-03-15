@extends('main')

@section('title', 'Create User')

@section('content')

<div class="container p-md-5">
    <h2>Create Users</h2>
    <!-- Mostrando os alertas por meio de components -->
    <x-alert />

    <hr>

    <form action="{{ route('users.store') }}" method="post" class="needs-validation row g-3" novalidate>

        <!-- Sempre quando eu trabalhar como formulários tenho que colocar o cross file (@csrf) -->
        @csrf
        <div class="col-md-6">
            <label for="name" class="form-label"> Name </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Your name..." value="{{ old('name') }}" required>
            <div class="invalid-feedback">
                Required
            </div>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label"> E-mail </label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Your e-mail..." value="{{ old('email') }}" required>
            <div class="invalid-feedback">
                Required
            </div>
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label"> Password </label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Your password..." required>
            <div class="invalid-feedback">
                Required
            </div>
        </div>
        <div class="col-md-12"><button type="submit" class="btn btn-success">Enviar</button></div>
    </form>

    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary mt-3">Voltar</a>
</div>

@endsection