<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>PHP and Laravel</title>
</head>
<body>
    @yield('content')

    <div class="container">
        <button type="button" class="btn btn-primary">enviar</button>
    </div>
</body>
</html>