@extends('admin.layouts.app')

@section('title', 'Criar novo Usuário')

@section('content')
    @include('admin.users.partials.breacrumb')

    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Novo Usuário</h2>
    </div>

    <form action="{{ route('users.createdUser') }}" method="POST">
        @include('admin.users.partials.form')
    </form>
@endsection