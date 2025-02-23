<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/resources/css/app.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title') - PHP and Laravel</title>
</head>

<body class="bg-gray-100 dark:bg-gray-700">
    @include('layouts.navigation')
    <!-- <header>
        header do sistema 1
    </header> -->

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @yield('content')
    </div>

    <!-- <footer>
        footer do sistema 2
    </footer> -->
</body>

</html>