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
        $adminRole = new Role();
        $adminRole->name = Role::DEFAULT_ADMIN_ROLE_NAME;
        $adminRole->save();

        $userRole = new Role();
        $userRole->name = Role::DEFAULT_USER_ROLE_NAME;
        $userRole->save();
    }
}
