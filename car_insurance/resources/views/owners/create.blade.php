@extends('layouts.app')
@section('content')
    <div class="container">
        @if(auth()->user()->isEditor())
        <h1>Add Owner</h1>
        <form action="{{ route('owners.store') }}" method="POST">
            @include('owners.form', ['buttonText' => 'Save'])
        </form>
        @endif
    </div>
@endsection
