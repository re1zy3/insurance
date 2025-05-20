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
                <th>{{__('Photo')}}</th>
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
                    <td>
                        @if($car->photos->count())
                            <img src="{{ asset('storage/' . $car->photos->first()->path) }}"
                                 alt="Car Photo"
                                 style="max-width: 80px; max-height: 60px; cursor:pointer;"
                                 onclick="openGallery({{ $car->id }})">
                            <div id="gallery-{{ $car->id }}" class="gallery-modal" style="display:none;">
                                <span class="close" onclick="closeGallery({{ $car->id }})">&times;</span>
                                <img id="gallery-img-{{ $car->id }}" src="" style="max-width:90vw; max-height:80vh; display:block; margin:auto;">
                                <button class="arrow left" onclick="prevPhoto({{ $car->id }})">&#8592;</button>
                                <button class="arrow right" onclick="nextPhoto({{ $car->id }})">&#8594;</button>
                            </div>
                            <script>
                                window.carPhotos = window.carPhotos || {};
                                window.carPhotos[{{ $car->id }}] = [
                                    @foreach($car->photos as $photo)
                                        "{{ asset('storage/' . $photo->path) }}",
                                    @endforeach
                                ];
                            </script>
                        @else
                            <span>{{ __('No photo') }}</span>
                        @endif
                    </td>
                    <td>{{ $car->reg_number }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->owner->name }} {{ $car->owner->surname }}</td>
                    <td>
                        @can('update', $car)
                            <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm">{{ __('Edit') }}</a>
                        @endcan
                        @can('delete', $car)
                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<style>
.gallery-modal {
    position: fixed; z-index: 9999; left: 0; top: 0; width: 100vw; height: 100vh;
    background: rgba(0,0,0,0.8); display: flex; align-items: center; justify-content: center;
}
.gallery-modal .close {
    position: absolute; top: 20px; right: 40px; color: #fff; font-size: 40px; cursor: pointer;
}
.gallery-modal .arrow {
    position: absolute; top: 50%; background: none; border: none; color: #fff; font-size: 40px; cursor: pointer;
    transform: translateY(-50%);
}
.gallery-modal .left { left: 40px; }
.gallery-modal .right { right: 40px; }
</style>
<script>
let currentPhotoIndex = {};
function openGallery(carId) {
    currentPhotoIndex[carId] = 0;
    showPhoto(carId);
    document.getElementById('gallery-' + carId).style.display = 'flex';
}
function closeGallery(carId) {
    document.getElementById('gallery-' + carId).style.display = 'none';
}
function showPhoto(carId) {
    let photos = window.carPhotos[carId];
    let idx = currentPhotoIndex[carId];
    document.getElementById('gallery-img-' + carId).src = photos[idx];
}
function prevPhoto(carId) {
    let photos = window.carPhotos[carId];
    currentPhotoIndex[carId] = (currentPhotoIndex[carId] - 1 + photos.length) % photos.length;
    showPhoto(carId);
}
function nextPhoto(carId) {
    let photos = window.carPhotos[carId];
    currentPhotoIndex[carId] = (currentPhotoIndex[carId] + 1) % photos.length;
    showPhoto(carId);
}
</script>
