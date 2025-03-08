<!DOCTYPE html>
<html lang="pt-br>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Colocando o 'asset()' vai direto para a pasta public do projeto -->
    
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet"> -->
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Project Laravel CRUD</title>
</head>

<body>

    <div class="container">
        @yield('content')
    </div

</body>

</html>