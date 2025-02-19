<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - PHP and Laravel</title>
</head>
<body>
    <header>
        header do sistema 1
    </header>
    @yield('content')
    <footer>
        footer do sistema 2
    </footer>
</body>
</html>