    <!-- Mostrando uma mensagem de sucesso quando o usuário for cadastrado com sucesso -->
    @if(session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-600 rounded-lg bg-green-50 border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mostrando uma mensagem de sucesso quando o usuário for cadastrado com sucesso -->
    @if(session()->has('message'))
        <div class="p-4 mb-4 text-sm text-yellow-600 rounded-lg bg-yellow-50 border border-yellow-200">
            {{ session('message') }}
        </div>
    @endif

    <!-- Mostrando uma mensagem de sucesso quando o usuário for cadastrado com sucesso -->
    @if(session()->has('error'))
        <div class="p-4 mb-4 text-sm text-red-600 rounded-lg bg-red-50 border border-red-200">
            {{ session('error') }}
        </div>
    @endif

    
    <!--  Essa é a parte de mostrar os erro caso tenha algum erro nas informaçẽos dos campos do formulário -->
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 border border-yellow-200">{{ $error }}</li>
        @endforeach
    </ul>
    @endif