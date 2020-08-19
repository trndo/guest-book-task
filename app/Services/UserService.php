<?php


namespace App\Services;


use App\Models\User;

class UserService
{
    public function changeIsBanned(User $user): bool
    {
        $user->is_banned = !$user->is_banned;

        return $user->update();
    }
}