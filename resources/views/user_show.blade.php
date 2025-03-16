@extends('main')

@section('title', 'Show User')

@section('content')

    <h2>Show User - <strong>{{ $user->name }}</strong></h2>

    <hr>
    
    <form action="{{ route('users.destroy', ['user' =>$user->id]) }}" method="post" class="row g-3">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
    
        <div class="col-md-6">
            <label for="name" class="form-label"> Name </label>
            <input type="text" class="form-control disabled" id="name" name="name" value="{{ $user->name }}" disabled readonly>
        </div>
    
        <div class="col-md-6">
            <label for="email" class="form-label"> E-mail </label>
            <input type="email" class="form-control disabled" id="email" name="email" value="{{ $user->email }}" disabled readonly>
        </div>
    
        <div class="col-md-12">
            <button type="submit" class="btn btn-danger m-2">Delete</button>
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary m-1">Voltar</a>
        </div>
    </form>
    

@endsection