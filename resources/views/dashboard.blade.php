<x-layout title="Dashboard">

    <!-- Messaggi di successo (es. Articolo eliminato con successo) -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4 text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <x-card class="glow">
        <!-- Intestazione Benvenuto -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
            <div>
                <h1 class="mb-1">Ciao, {{ auth()->user()->name }} ✨</h1>
                <p class="text-muted mb-0">Questo è il tuo pannello di controllo per gestire il blog.</p>
            </div>
            <a href="{{ route('articles.create') }}" class="btn btn-success shadow-sm">
                ➕ Scrivi un nuovo Articolo
            </a>
        </div>

        <!-- 📂 SEZIONE: TABELLA GESTIONE ARTICOLI -->
        <div class="mt-4">
            <h4 class="mb-3 text-secondary">📰 Gestisci i tuoi Articoli</h4>
            
            <div class="table-responsive bg-white rounded shadow-sm border p-3">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 10%">ID</th>
                            <th scope="col" style="width: 50%">Titolo</th>
                            <th scope="col" style="width: 20%">Data di Pubblicazione</th>
                            <th scope="col" style="width: 20%" class="text-end">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- 
                          Se hai una relazione 'articles' nel modello User, usa: $articles = auth()->user()->articles
                          Altrimenti, per ora passiamo una variabile $articles dal controller.
                        --}}
                        @forelse ($articles as $article)
                            <tr>
                                <td><strong>#{{ $article->id }}</strong></td>
                                <td>
                                    <span class="d-inline-block text-truncate" style="max-width: 300px;">
                                        {{ $article->title }}
                                    </span>
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ $article->created_at ? $article->created_at->format('d/m/Y') : 'N/D' }}
                                    </small>
                                </td>
                                <td class="text-end">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <!-- Tasto Leggi -->
                                        <a href="{{ route('article.show', $article) }}" class="btn btn-sm btn-outline-primary" title="Leggi">
                                            👁️
                                        </a>
                                        <!-- Tasto Modifica (Rotta da creare in futuro) -->
                                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-outline-warning" title="Modifica">
                                           ✏️
                                         </a>

                                        <!-- Tasto Elimina con Form di sicurezza -->
                                        <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Elimina">
                                                🗑️
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    Non hai ancora scritto nessun articolo. <a href="{{ route('articles.create') }}">Crea il primo!</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </x-card>

</x-layout>
