<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatedUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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

        User::create($request->validated());

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


    public function update(UpdateUserRequest $request, string $id)
    {
        if (!$user = User::find($id)) {
            return back()->with('message', 'Usuário não encontrado..');
        }

        $data = $request->only('name', 'email');
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        // dd($data);
        $user->update($data);

        $user->update($request->only([
            'name',
            'email',
        ]));

        return redirect()
            ->route('users.index')
            ->with("success", "Usuário editado com sucesso!!");
    }

    public function show(string $id)
    {
        if (!$user = User::find($id)) {
            return redirect()
                ->route('users.index')
                ->with('message', 'Usuário não encontrado!');
        }

        return view('admin.users.show', compact('user'));
    }

    public function destroy(string $id)
    {

        ## Essa é uma forma de verificar se o usuário é um administrador
        // Esse parâmetro 'denise' verifica se o usuário " NÃO É (TEM) " a condição dentro do if
        // Ao contrário do 'allows' que verifica se o usuário " É (TEM) " a condição dentro do if
        // if (Gate::denies('is-admin')) {
        //     return back()
        //         ->with('message', 'Você não é um administrador!');
        // }


        if (!$user = User::find($id)) {
            return redirect()
                ->route('users.index')
                ->with('message', 'Usuário não encontrado!');
        }

        // Isso é para o usuário não deletar o próprio acesso dele
        if (Auth::user()->id === $user->id) {
            return back()
                ->with('message', 'Você não pode deletar o seu próprio usuário!');
        }

        // Esse método 'delete' vai retornar 'true' ou 'false' se o usuário foi deletado ou não
        // E eu poderia mandar os campos a ser deletado dentro de um array como parâmetro do método 'delete'
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário deletado com sucesso!');
    }
}
