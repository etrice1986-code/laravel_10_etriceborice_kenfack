<x-layout title="Modifica Articolo">

    <x-card class="glow">
        <h1 class="mb-4">Modifica l'Articolo</h1>

        <!-- Form che punta alla rotta update usando il metodo POST + @method('PUT') -->
        <form action="{{ route('articles.update', $article) }}" method="POST">
            @csrf
            @method('PUT') {{-- Spiega a Laravel che stiamo facendo una modifica --}}

            <!-- Campo Titolo -->
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Titolo dell'Articolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $article->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo Contenuto -->
            <div class="mb-3">
                <label for="content" class="form-label fw-bold">Contenuto</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6">{{ old('content', $article->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pulsanti di Azione -->
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning px-4">Salva Modifiche</button>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Annulla</a>
            </div>
        </form>
    </x-card>

</x-layout>
