@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit ShortCode: {{ $shortcode->shortcode }}</h1>

        <form action="{{ route('shortcodes.update', $shortcode) }}" method="POST">
            @method('PUT')
            @include('short_codes._form', ['buttonText' => 'Update'])
        </form>
    </div>
@endsection

