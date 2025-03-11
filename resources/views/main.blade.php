@extends('layouts.app')

@section('title', 'Home')
    
@section('content')

<!-- Tenho que arrumar essa parte do projeto para aparecer os títulos corretos -->
    <!-- <title>Project Laravel CRUD</title> -->
    <title>{{ config('app.name', 'CRUD and Laravel') }}</title>

    <div class="container">
        <!-- Tenho que verificar como funciona esse elemento 'Yield' -->
        @yield('content') <!-- Esse elemento é para o conteúdo dinâmico do projeto (template) -->

        <h2>Home Page</h2>
    </div

@endsection