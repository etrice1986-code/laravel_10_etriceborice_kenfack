<x-layout title="Home">

    <!-- Sezione di Benvenuto Principale -->
    <x-card class="glow mb-5">
        
        @auth
            <h2 class="mb-2 text-primary">Bentornato, {{ auth()->user()->name }} 👋</h2>
        @else
            <h2 class="mb-2 text-secondary">Benvenuta nel Blog Fortify ✨</h2>
        @endauth

        <h1 class="display-5 fw-bold mb-3">Il punto di riferimento per le tue letture</h1>
        <p class="fs-5 text-muted mb-4">Esplora le ultime novità del mondo tech, leggi gli articoli più recenti o contribuisci pubblicando una tua storia.</p>

        <div class="d-flex gap-3 flex-wrap">
            <a href="{{ route('articles.index') }}" class="btn btn-primary btn-lg px-4 shadow-sm">
                📰 Esplora gli Articoli
            </a>

            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-outline-dark btn-lg px-4">
                    🖥️ Vai alla Dashboard
                </a>
            @else
                <a href="/register" class="btn btn-outline-primary btn-lg px-4">
                    🚀 Unisciti a noi (Registrati)
                </a>
            @endauth
        </div>

    </x-card>

    <!-- 🌟 NUOVA SEZIONE: ULTIMI ARTICOLI PUBBLICATI -->
    <div class="my-5">
        <h3 class="mb-4 fw-bold border-bottom pb-2">🔥 Gli ultimi articoli inseriti</h3>
        
        <div class="row">
            {{-- Questo ciclo mostrerà solo gli articoli passati dal controller --}}
            @forelse ($latestArticles as $article)
                <div class="col-md-4 mb-4">
                    <div class="p-3 bg-white border rounded shadow-sm h-100 d-flex flex-column justify-content-between">
                        <div>
                            <h4 class="h5 fw-bold text-dark text-truncate">{{ $article->title }}</h4>
                            <p class="text-muted small mb-3">{{ Str::limit($article->content, 90) }}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                            <small class="text-secondary">
                                📅 {{ $article->created_at ? $article->created_at->format('d/m/Y') : 'N/D' }}
                            </small>
                            <a href="{{ route('article.show', $article) }}" class="btn btn-sm btn-link text-primary p-0 fw-bold">
                                Leggi →
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-4">
                    <p class="fs-5 mb-0">Non ci sono ancora articoli pubblicati sul blog. Sii il primo a scriverne uno!</p>
                </div>
            @endforelse
        </div>
    </div>

</x-layout>
