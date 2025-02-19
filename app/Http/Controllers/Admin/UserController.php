<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatedUserRequest;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class UserController extends Controller
{
    ### CRIANDO ACTIONS
    public function index()
    {

        // Esse comando 'all' ou o 'get' vai pegar todos os usuários do banco de dados
        // $users = User::all();
        // dd($users);

        // Esse parâmetro de 'paginate' serve para a padinação dos dados para não mostrar todos os dados de uma vez
        $users = User::paginate(10);

        // O mesmo nome do MÉTODO e o da VIEW (index)
        // Aqui eu nunca retorno uma string
        return view('admin.users.index', compact('users'));
    }

    //O mesmo nome do MÉTODO e o da VIEW
    public function create()
    {
        return view('admin.users.create');
    }


    public function createdUser(CreatedUserRequest $request)
    {

        User::create($request->all());

        return redirect()
            ->route('users.index')
            ->with("success", "Usuário criado com sucesso!!");
    }

    public function edit(string $id)
    {

        ## Formas de buscar e comparar o id do usuário para alteração
        // $users = User::where($id, '=', $id)->first();
        // $users = User::where($id, $id)->first(); PARA APIs: 'furstOrFail()'


        if (!$user = User::find($id)) {
            return redirect()
                ->route('users.index')
                ->with('message', 'Usuário não encontrado!');
        }

        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request, string $id)
    {
        if (!$user = User::find($id)) {
            return back()->with('message', 'Usuário não encontrado..');
        }

        $user->update($request->only([
            'name',
            'email',
        ]));

        return redirect()
            ->route('users.index')
            ->with("success", "Usuário editado com sucesso!!");
    }
}
