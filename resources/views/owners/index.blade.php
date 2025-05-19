@extends('layouts.app')

@section('content')
<p id="shortcode-test">This is a test: [[TestShortCode]] 5 seconds</p>
<script>
    setTimeout(function() {
        var el = document.getElementById('shortcode-test');
        if (el) el.style.display = 'none';
    }, 5000);
</script>
<div class="container">
    <h1>{{ __('car_owners') }}</h1>
    <a href="{{ route('owners.create') }}" class="btn btn-primary mb-3">{{ __('add_owner') }}</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>{{__('Name')}}</th>
                <th>{{__('Surname')}}</th>
                <th>{{__('Phone')}}</th>
                <th>{{__('Email')}}</th>
                <th>{{__('Address')}}</th>
                <th>{{__('Actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($owners as $owner)
                <tr>
                    <td>{{ $owner->name }}</td>
                    <td>{{ $owner->surname }}</td>
                    <td>{{ $owner->phone }}</td>
                    <td>{{ $owner->email }}</td>
                    <td>{{ $owner->address }}</td>
                    <td>
                        <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-warning btn-sm">{{__('Edit')}}</a>
                        <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm{{__('Are you sure?')}}'">{{__('Delete')}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection