@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Owner</h1>

    <form action="{{ route('owners.store') }}" method="POST">
        @csrf
        @include('owners.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection