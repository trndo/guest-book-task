<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Toggle ban for user
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function toggleBan(User $user): RedirectResponse
    {
        $this->userService->updateIsBanned($user);

        return redirect()->route('home');
    }
}