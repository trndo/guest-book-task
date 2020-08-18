<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public const DEFAULT_ADMIN_ROLE_NAME = 'admin';
    public const DEFAULT_USER_ROLE_NAME = 'user';

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
