<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRole = Role::where('name', Role::DEFAULT_USER_ROLE_NAME)
            ->first();

        factory(User::class, 5)->create()
            ->each(function ($user) use ($userRole) {
                $user->roles()->attach($userRole);
        });
    }
}
