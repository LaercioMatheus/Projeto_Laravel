    <!-- Mostrando uma mensagem de sucesso quando o usuário for cadastrado com sucesso -->
    @if(session()->has('success'))
        <div class="bg-green-100 border border-green-40">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mostrando uma mensagem de sucesso quando o usuário for cadastrado com sucesso -->
    @if(session()->has('message'))
        <div class="bg-yellow-100 border border-yellow-40">
            {{ session('message') }}
        </div>
    @endif

    <!-- Mostrando uma mensagem de sucesso quando o usuário for cadastrado com sucesso -->
    @if(session()->has('error'))
        <div class="bg-red-100 border border-red-40">
            {{ session('error') }}
        </div>
    @endif

    
    <!--  Essa é a parte de mostrar os erro caso tenha algum erro nas informaçẽos dos campos do formulário -->
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="text-red-500">{{ $error }}</li>
        @endforeach
    </ul>
    @endif