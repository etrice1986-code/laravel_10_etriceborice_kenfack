<div class="mb-3">
    <label class="form-label">{{ $label }}</label>
    <input 
        type="{{ $type ?? 'text' }}" 
        name="{{ $name }}" 
        class="form-control"
        value="{{ old($name) }}"
    >
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
