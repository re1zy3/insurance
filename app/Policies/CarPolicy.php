<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CarPolicy
{

    public function viewAny(User $user): bool
    {
        return $user->role === 'admin'
            || $user->role === 'readonly'
            || $user->role === 'user';
    }

    public function view(User $user, Car $car)
    {
        return $user->role === 'admin'
            || $user->role === 'readonly'
            || $car->owner->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin'
            || $user->role === 'user';
    }

    public function update(User $user, Car $car)
    {
        return $user->role === 'admin'
            || $car->owner->user_id === $user->id;
    }

    public function delete(User $user, Car $car)
    {
        return $user->role === 'admin'
            || $car->owner->user_id === $user->id;
    }

    public function restore(User $user, Car $car): bool
    {
        return false;
    }

    public function forceDelete(User $user, Car $car): bool
    {
        return false;
    }
}
