<x-layout title="{{ $article->title }}">

    <!-- Usiamo il tuo componente card per dare continuità alla grafica -->
    <x-card class="glow">

        <!-- Pulsante per tornare all'elenco completo degli articoli -->
        <div class="mb-4">
            <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary btn-sm">
                ← Torna agli articoli
            </a>
        </div>

        <!-- Intestazione dell'articolo -->
        <header class="mb-4 border-bottom pb-3">
            <h1 class="display-4 fw-bold text-dark">{{ $article->title }}</h1>
            
            <div class="text-muted small d-flex gap-3 mt-2">
                <span>📅 Pubblicato il: 
    <strong>
        {{ $article->created_at ? $article->created_at->format('d/m/Y \a_l_l_e H:i') : 'Data non disponibile' }}
    </strong>
</span>

            </div>
        </header>

        <!-- Corpo dell'articolo -->
        <article class="article-content fs-5 text-secondary lh-lg mb-5">
            <!-- nl2br serve a mantenere gli a capo che l'utente inserisce nel testo -->
            {!! nl2br(e($article->content)) !!}
        </article>

    </x-card>

</x-layout>
