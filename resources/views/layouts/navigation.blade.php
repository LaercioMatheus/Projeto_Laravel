<nav x-data="{ open: false }" class="navbar navbar-expand-lg bg-body-tertiary">

    <!-- Primary Navigation Menu -->
    <div class="container-fluid">

        <!-- Logo -->
        <div class="container container-logo">
            <a href="{{ route('home') }}" class="navbar-brand">
                <x-application-logo class="aplication-logo" />
            </a>
        </div>

        <!-- Botão para abrir o menu de navegação sanduiche tenho que colocar ele mais para baixo-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <!-- Link para redirecionar o usuário para a página do home -->
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <!-- Botão para redirecionar o usuário para a página de registros -->
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                        {{ __('Users') }}
                    </x-nav-link>
                </li>
            </ul>

            <!-- Settings Dropdown -->
            <x-dropdown>
                <x-slot name="trigger">
                    <button class="">
                        <div>{{ Auth::user()->name }}</div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <!-- Profile -->
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>

            <!-- Icon mode Dark and Light -->
            <div class="m-2 flex items-center">
                <input type="checkbox" class="checkbox"></input>
            </div>
        </div>
    </div>
</nav>