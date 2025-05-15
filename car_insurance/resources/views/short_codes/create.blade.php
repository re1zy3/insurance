@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New ShortCode</h1>

        <form action="{{ route('shortcodes.store') }}" method="POST">
            @include('short_codes._form', ['buttonText' => 'Create'])
        </form>
    </div>
@endsection

