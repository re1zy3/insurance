@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Car</h1>
        <form action="{{ route('cars.store') }}" method="POST">
            @include('cars.form', ['buttonText' => 'Save'])
        </form>
    </div>
@endsection
