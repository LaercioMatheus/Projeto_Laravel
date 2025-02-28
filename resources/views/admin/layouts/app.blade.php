<!-- ESSE FOI O APP QUE EU CRIEI -->


<!DOCTYPE html>
<html lang="{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="/resources/css/app.css" rel="stylesheet"> -->
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

    <title>@yield('title') - PHP and Laravel</title>
</head>

<body class="dark-mode">
    @include('layouts.navigation')

    <header class="header">
    <div class="">
            <div class="container">
                <div class="text-success">
                    {{ __("Welcome :)") }}
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container-md">
            <div class="">
                <div class="bg-white">
                    <div class="">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <p>Desenvolvedor - <a href="#"> Laércio Matheus </a></p>
    </footer>
    <script type="module" src="{{ asset('resources/js/app.js') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>