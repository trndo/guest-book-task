<?php


namespace App\Services;

use App\Models\{Role, User};
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * @var RoleService
     */
    private $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function create(array $validatedData)
    {
        $userRole = $this->roleService->getRoleByName(
            Role::DEFAULT_USER_ROLE_NAME
        );

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $user->roles()->attach($userRole);

        return $user;
    }

    /**
     * Update user's is_banned property
     *
     * @param User $user
     * @return bool
     */
    public function updateIsBanned(User $user): bool
    {
        $user->is_banned = !$user->is_banned;

        return $user->update();
    }
}