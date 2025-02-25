    <!-- Mostrando uma mensagem de sucesso quando o usuário for cadastrado com sucesso -->
    @if(session()->has('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mostrando uma mensagem de sucesso quando o usuário for cadastrado com sucesso -->
    @if(session()->has('message'))
        <div class="alert-info">
            {{ session('message') }}
        </div>
    @endif

    <!-- Mostrando uma mensagem de sucesso quando o usuário for cadastrado com sucesso -->
    @if(session()->has('error'))
        <div class="alert-danger">
            {{ session('error') }}
        </div>
    @endif

    
    <!--  Essa é a parte de mostrar os erro caso tenha algum erro nas informaçẽos dos campos do formulário -->
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="alert-warning">{{ $error }}</li>
        @endforeach
    </ul>
    @endif