<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
     
        // Esse comando 'all' ou o 'get' vai pegar todos os usuários do banco de dados
        // $users = User::all();

        // Esse parâmetro de 'paginate' serve para a padinação dos dados para não mostrar todos os dados de uma vez
        $users = User::paginate(10);

        // Aqui eu nunca retorno uma string 
        return view('admin.users.index', compact('users'));
    }
}
