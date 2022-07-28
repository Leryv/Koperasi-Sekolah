<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;

class AclSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        $permissions = Permission::defaultPermissions();
        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }
        $this->command->info('Default Permissions added.');

        $roles = Role::defaultRoles();
        foreach ($roles as $role) {
            $role = Role::firstOrCreate(['name' => $role]);

            if ($role->name == 'ketua') {
                $role->givePermissionTo(Permission::all());
            }
        }

        $this->command->info('Default Roles added.');
    }
}
