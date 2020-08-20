<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleNames = [
            Role::DEFAULT_ADMIN_ROLE_NAME,
            Role::DEFAULT_USER_ROLE_NAME
        ];

        foreach ($roleNames as $roleName) {
            factory(Role::class)->create(['name' => $roleName]);
        }
    }
}
