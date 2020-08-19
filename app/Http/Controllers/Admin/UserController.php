<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.is_admin');
    }

    public function ban(User $user)
    {
        $user->is_banned = !$user->is_banned;
        $user->save();

        return redirect(route('home'));
    }
}