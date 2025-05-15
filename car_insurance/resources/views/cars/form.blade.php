@csrf

<div class="mb-3">
    <label>Registration Number</label>
    <input type="text" name="reg_number"
           value="{{ old('reg_number', $car->reg_number ?? '') }}"
           class="form-control" required>
</div>

<div class="mb-3">
    <label>Brand</label>
    <input type="text" name="brand"
           value="{{ old('brand', $car->brand ?? '') }}"
           class="form-control" required>
</div>

<div class="mb-3">
    <label>Model</label>
    <input type="text" name="model"
           value="{{ old('model', $car->model ?? '') }}"
           class="form-control" required>
</div>

<div class="mb-3">
    <label>Owner</label>
    <select name="owner_id" class="form-control" required>
        <option value="">— Select owner —</option>
        @foreach($owners as $owner)
            <option value="{{ $owner->id }}"
                {{ (old('owner_id', $car->owner_id ?? '') == $owner->id) ? 'selected' : '' }}>
                {{ $owner->name }} {{ $owner->surname }}
            </option>
        @endforeach
    </select>
</div>

<button class="btn btn-primary">{{ $buttonText }}</button>
