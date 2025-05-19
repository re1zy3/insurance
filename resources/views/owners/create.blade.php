@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{__('Add New Owner')}}</h1>

    <form action="{{ route('owners.store') }}" method="POST">
        @csrf
        @include('owners.form')
        <button type="submit" class="btn btn-success">{{__('Save')}}</button>
    </form>
</div>
@endsection