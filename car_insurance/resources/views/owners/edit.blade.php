@extends('layouts.app')
@section('content')
    <div class="container">
        @if(auth()->user()->isEditor())
        <h1>Edit Owner</h1>
        <form action="{{ route('owners.update', $owner) }}" method="POST">
            @method('PUT')
            @include('owners.form', ['buttonText' => 'Update'])
        </form>
        @endif
    </div>
@endsection
