<x-layout title="Crea Articolo"> 
    <x-card class="glow"> 
        <h1 class="mb-4">Nuovo Articolo</h1> 
        
        <form action="{{ route('articles.store') }}" method="POST"> 
            @csrf 

            <!-- Campo Titolo -->
            <div class="mb-3"> 
                <label class="form-label">Titolo</label> 
                <input type="text" 
                       name="title" 
                       class="form-control @error('title') is-invalid @enderror" 
                       value="{{ old('title') }}"> 
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> 

            <!-- Campo Contenuto -->
            <div class="mb-3"> 
                <label class="form-label">Contenuto</label> 
                <textarea name="content" 
                          rows="5" 
                          class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea> 
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> 

            <button class="btn btn-primary w-100">Pubblica</button> 
        </form> 
    </x-card> 
</x-layout>
