<x-layout title="Dashboard">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4 text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <x-card class="glow">
        <h1 class="mb-3">Ciao {{ auth()->user()->name }} ✨</h1>
        <p>Sei autenticat correttamente.</p>
    </x-card>

</x-layout>
