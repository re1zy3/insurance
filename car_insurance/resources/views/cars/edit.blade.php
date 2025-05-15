@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Car</h1>
        <form action="{{ route('cars.update', $car) }}" method="POST">
            @method('PUT')
            @include('cars.form', ['buttonText' => 'Update'])
        </form>
    </div>
@endsection
