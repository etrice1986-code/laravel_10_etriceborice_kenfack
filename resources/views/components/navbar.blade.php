<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{ route('home') }}">Fortify</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

        <!-- SINISTRA -->
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('articles.index') }}">Articoli</a>
            </li>
        </ul>

        <!-- DESTRA -->
        <ul class="navbar-nav">

            @auth
                

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.create') }}">Nuovo Articolo</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-logout">Logout</button>
                    </form>
                </li>

                <!-- Avatar -->
                <li class="nav-item d-flex align-items-center ms-5">
                    <div class="nav-avatar" title="Ciao, {{ auth()->user()->name }} 👋">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                </li>

            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                </li>
            @endauth

        </ul>

    </div>
</nav>

<div class="navbar-divider"></div>
