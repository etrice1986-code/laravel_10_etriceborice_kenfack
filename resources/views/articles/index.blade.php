<x-layout title="Articoli">

    <x-card class="glow">

        <h1 class="mb-4">Articoli Pubblicati</h1>

        @foreach ($articles as $article)
            <div class="mb-3 p-3 card">
                <h3>{{ $article->title }}</h3>
                <p>{{ Str::limit($article->content, 150) }}</p>
                <small>Pubblicato il {{ $article->created_at->format('d/m/Y') }}</small>
            </div>
        @endforeach

    </x-card>

</x-layout>
