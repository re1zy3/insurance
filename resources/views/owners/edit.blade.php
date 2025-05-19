@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{__('Update')}}</h1>

    <form action="{{ route('owners.update', $owner->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('owners.form', ['owner' => $owner])
        <button type="submit" class="btn btn-success">{{__('Update')}}</button>
    </form>
</div>
@endsection