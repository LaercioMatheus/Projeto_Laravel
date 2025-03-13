@extends('main')

@section('title', 'Show User')

@section('content')

<div class="container d-block">
    <h2>Show User - <strong>{{ $user->name }}</strong></h2>

    <hr>
    
    <form action="{{ route('users.destroy', ['user' =>$user->id]) }}" method="post" class="row g-3">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
    
        <div class="col-md-6">
            <label for="name" class="form-label"> Name </label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
    
        <div class="col-md-6">
            <label for="email" class="form-label"> E-mail </label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
    
        <div class="col-md-12">
            <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>
    
    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary mt-2">Voltar</a>
</div>

@endsection