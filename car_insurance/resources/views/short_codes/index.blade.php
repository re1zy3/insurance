
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h1>ShortCodes</h1>
            @if(auth()->user()->isEditor())
                <a href="{{ route('shortcodes.create') }}" class="btn btn-primary">Add ShortCode</a>
            @endif
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Shortcode</th>
                <th>Replacement Text</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($codes as $code)
                <tr>
                    <td>{{ $code->shortcode }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($code->replace, 50) }}</td>
                    <td>
                        <a href="{{ route('shortcodes.show', $code) }}" class="btn btn-sm btn-info">View</a>
                        @if(auth()->user()->isEditor())
                            <a href="{{ route('shortcodes.edit', $code) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('shortcodes.destroy', $code) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this shortcode?')">
                                    Delete
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
