@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('Update') }}</h1>

    <form action="{{ route('cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="reg_number" class="form-label">{{ __('Registration Number') }}</label>
            <input type="text" class="form-control" id="reg_number" name="reg_number" value="{{ old('reg_number', $car->reg_number) }}" required>
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">{{ __('Brand') }}</label>
            <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $car->brand) }}" required>
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">{{ __('Model') }}</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model', $car->model) }}" required>
        </div>
        <div class="mb-3">
            <label for="owner_id" class="form-label">{{ __('Owner') }}</label>
            <input type="number" class="form-control" id="owner_id" name="owner_id" value="{{ old('owner_id', $car->owner_id) }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
    </form>
</div>
@endsection