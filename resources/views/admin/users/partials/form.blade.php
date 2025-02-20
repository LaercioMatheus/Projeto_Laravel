<!-- Aqui eu posso colocar os alertas de ourto arquivo dentro desse por meio do "include", mas essa maneira é mais funcional e compacta para projetos maiores -->
<!-- Ou posso colocar simplesmente assim -->
<x-alert />

<!-- Esse é o token do formulário, ele compara o token de origem e o de sessão para a validação -->
@csrf()
<input type="text" name="name" placeholder="Informe o Nome..." value="{{ $user->name ?? old('name') }}">
<input type="email" name="email" placeholder="Informe o E-mail..." value="{{ $user->email ?? old('email') }}">
<input type="password" name="password" placeholder="Informe a sua Senha...">
<button type="submit">Enviar</button>