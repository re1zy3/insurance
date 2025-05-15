@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Owner</h1>
        <form action="{{ route('owners.update', $owner) }}" method="POST">
            @method('PUT')
            @include('owners.form', ['buttonText' => 'Update'])
        </form>
    </div>
@endsection
