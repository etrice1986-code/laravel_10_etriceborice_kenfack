<x-layout title="Home">

    <x-card class="glow">

        @auth
            <h2 class="mb-3">Benvenuto, {{ auth()->user()->name }} ✨</h2>
        @endauth

        <h1 class="mb-3">Benvenuta nel Blog Fortify ✨</h1>
        <p class="mb-4">Leggi gli articoli più recenti o pubblicane uno nuovo.</p>

        <a href="{{ route('articles.index') }}" class="btn btn-primary w-100 mb-3">
            Vai agli Articoli
        </a>

        @auth
            <a href="{{ route('articles.create') }}" class="btn btn-secondary w-100">
                Scrivi un Articolo
            </a>
        @endauth

    </x-card>

</x-layout>
