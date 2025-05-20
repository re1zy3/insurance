<?php

namespace App\Policies;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OwnerPolicy
{

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Owner $owner)
    {
        return $user->role === 'admin'
            || $user->role === 'readonly'
            || $owner->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Owner $owner)
    {
        return $user->role === 'admin'
            || $owner->user_id === $user->id;
    }

    public function delete(User $user, Owner $owner)
    {
        return $user->role === 'admin'
            || $owner->user_id === $user->id;
    }

    public function restore(User $user, Owner $owner): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Owner $owner): bool
    {
        return false;
    }
}
