@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>ShortCode: {{ $shortcode->shortcode }}</h1>

        <div class="mb-3">
            <label class="form-label"><strong>Replacement Text</strong></label>
            <div class="form-control-plaintext">{{ $shortcode->replace }}</div>
        </div>

        <a href="{{ route('shortcodes.index') }}" class="btn btn-secondary">← Back to list</a>
        @if(auth()->user()->isEditor())
            <a href="{{ route('shortcodes.edit', $shortcode) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('shortcodes.destroy', $shortcode) }}"
                  method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger"
                        onclick="return confirm('Delete this shortcode?')">
                    Delete
                </button>
            </form>
        @endif
    </div>
@endsection
