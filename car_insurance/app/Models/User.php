<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory; /* … */

    /** Fillable so you can mass-assign role if needed */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /** Helpers */
    public function isEditor(): bool
    {
        return $this->role === 'editor';
    }
}
