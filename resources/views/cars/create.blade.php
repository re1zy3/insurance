@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('Add New Car') }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cars.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="reg_number" class="form-label">{{ __('Registration Number') }}</label>
            <input type="text" class="form-control" id="reg_number" name="reg_number" value="{{ old('reg_number') }}" required>
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">{{ __('Brand') }}</label>
            <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}" required>
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">{{ __('Model') }}</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}" required>
        </div>
        <div class="mb-3">
            <label for="owner_id" class="form-label">{{ __('Owner ID') }}</label>
            <input type="number" class="form-control" id="owner_id" name="owner_id" value="{{ old('owner_id') }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
    </form>
</div>
@endsection