@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{__('Cars')}}</h1>
    <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">{{__('Add Car')}}</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>{{__('Registration Number')}}</th>
                <th>{{__('Brand')}}</th>
                <th>{{__('Model')}}</th>
                <th>{{__('Owner')}}</th>
                <th>{{__('Update')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $car->reg_number }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->owner->name }} {{ $car->owner->surname }}</td>
                    <td>
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm">{{__('Edit')}}</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{__('Are you sure?')}}')">{{__('Delete')}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
