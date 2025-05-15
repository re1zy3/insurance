@csrf

<div class="mb-3">
    <label for="shortcode" class="form-label">Shortcode</label>
    <input
        type="text"
        id="shortcode"
        name="shortcode"
        value="{{ old('shortcode', $shortcode->shortcode ?? '') }}"
        class="form-control @error('shortcode') is-invalid @enderror"
        required>
    @error('shortcode')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="replace" class="form-label">Replacement Text</label>
    <textarea
        id="replace"
        name="replace"
        rows="4"
        class="form-control @error('replace') is-invalid @enderror"
        required>{{ old('replace', $shortcode->replace ?? '') }}</textarea>
    @error('replace')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
<a href="{{ route('shortcodes.index') }}" class="btn btn-secondary">Cancel</a>

