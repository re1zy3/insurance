<div class="mb-3">
    <label>{{__('Name')}}</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $owner->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>{{__('Surname')}}</label>
    <input type="text" name="surname" class="form-control" value="{{ old('surname', $owner->surname ?? '') }}" required>
</div>

<div class="mb-3">
    <label>{{__('Phone')}}</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $owner->phone ?? '') }}" required>
</div>

<div class="mb-3">
    <label>{{__('Email')}}</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $owner->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label>{{__('Address')}}</label>
    <textarea name="address" class="form-control" required>{{ old('address', $owner->address ?? '') }}</textarea>
</div>