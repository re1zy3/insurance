@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Owner</h1>

    <form action="{{ route('owners.update', $owner->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('owners.form', ['owner' => $owner])
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection