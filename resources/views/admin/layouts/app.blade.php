<!DOCTYPE html>
<html lang="{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="/resources/css/app.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title') - PHP and Laravel</title>
</head>

<body class="">
    @include('layouts.navigation')

    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Usuários
            </h2>
        </div>
    </header>

    <main>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- <footer>
        footer do sistema 2
    </footer> -->
    <script type="module" src="{{ asset('resources/js/app.js') }}"></script>
</body>

</html>