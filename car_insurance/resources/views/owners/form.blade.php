@csrf

<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $owner->name ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
    <label>Surname</label>
    <input type="text" name="surname" value="{{ old('surname', $owner->surname ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" value="{{ old('phone', $owner->phone ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $owner->email ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
    <label>Address</label>
    <textarea name="address" class="form-control" required>{{ old('address', $owner->address ?? '') }}</textarea>
</div>
<button class="btn btn-primary">{{ $buttonText }}</button>
