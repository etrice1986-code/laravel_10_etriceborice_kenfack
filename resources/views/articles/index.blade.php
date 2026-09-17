<x-layout title="Articoli">

    <x-card class="glow">

        <h1 class="mb-4">Articoli Pubblicati</h1>

        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-6 mb-4">
                    <!-- Il contenitore dell'articolo ha ora 'd-flex flex-column' per spingere il bottone in basso -->
                    <div class="p-3 bg-light border rounded shadow-sm h-100 d-flex flex-column justify-content-between">
                        
                        <div>
                            <h3>{{ $article->title }}</h3>
                            <p class="text-muted">{{ Str::limit($article->content, 150) }}</p>
                            <small class="text-secondary d-block mb-3">
                                Pubblicato il {{ $article->created_at->format('d/m/Y') }}
                            </small>
                        </div>

                        <!-- Ecco il nuovo pulsante "Leggi di più" -->
                        <div>
                           <a href="{{ route('article.show', $article) }}" class="btn btn-primary btn-sm">
                            Leggi di più
                           </a>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </x-card>

</x-layout>
