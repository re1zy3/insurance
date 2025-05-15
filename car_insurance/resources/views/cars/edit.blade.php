@extends('layouts.app')

@section('content')
    <div class="container">
        @if(auth()->user()->isEditor())
        <h1>Edit Car</h1>
        <form action="{{ route('cars.update', $car) }}" method="POST">
            @method('PUT')
            @include('cars.form', ['buttonText' => 'Update'])
        </form>
        @endif
    </div>
@endsection
