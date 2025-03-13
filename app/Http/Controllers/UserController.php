<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class UserController extends Controller
{

    /* Isso é para não ficar chamando o método User em toda a função do CRUD
     * Ou seja, não escrever esse script: '$user = new User;' em toda a função do crud
    */

    public readonly User $user;

    public function __construct()
    {
        $this->user = new User();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Aqui é a listagem dos usuários do banco de dados
        // Pegando todos os usuários, posso usar ( all() ou Get() )
        $users = $this->user->paginate(10);
        return view('users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Aqui é onde fica o código para criar usuários para o sistema
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        // Aqui é para mandar os dados do 'create' para o banco de dados
        // var_dump($request->except(['_token']));

        $created = $this->user->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_BCRYPT),
        ]);

        if ($created) {
            return redirect()->back()->with('message', 'Successfully created');
        }

        return redirect()->route('users')->with('alert', 'Error create');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Aqui é onde vai ser detalhado os dados dos usuários
        // var_dump($user);

        // Estrutura nova para mostrar a mensagem de usuário não encontrado
        return view('user_show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        // Aqui é a lógica de editar os dados dos usuários
        //var_dump($user);
        // dd($user);

        // ESTRUTURA ANTIGA
        //'Passando os parâmetros dentro da classe'
        /*if (!$users = $this->user->where('user', $user)) {
            return redirect()->route('users.index')->with('alert', 'Usuário não encontrado');
        }
        return view('user_edit', ['user' => $user]);
        */

        // Estrutura nova para mostrar a mensagem de usuário não encontrado
        if (!$user = User::where('id', $id)->first()) {
            return redirect()->route('users.index')->with('alert', 'User not found');
        }

        // Esse retorno vai mandar as informações do usuário para a página de edição permitindo pegar as informações de dentro da variável '$user'
        return view('user_edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        // Aqui é a lógica de atualizar os dados do usuário

        // Aqui está pegando todas os dados com excessão o TOKEN (para velidação) e o METODO DE ENVIO (verbo)
        /* var_dump(request()->except(['_token', '_method']));*/

        // Estrutura para mostrar a mensagem de usuário não encontrado
        if (!$user = User::where('id', $id)->first()) {
            return redirect()->route('users.index')->with('alert', 'User not found');
        }

        // Atualizando os dados
        $updated = $this->user->where('id', $id)->update($request->except(['_token', '_method']));

        // Condição para alterar os dados e redirecionar o usuário para o início
        if ($updated) {
            return redirect()->back()->with('message', 'Successfully updated');
        }

        return redirect()->route('users')->with('alert', 'Error update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Aqui é onde os dados serão deletados da lista de users

        $deleted = $this->user->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('users.index')->with('message', 'Successfully deleted');
        }

        return redirect()->route('users.index')->with('alert', 'Error delete');
    }
}
