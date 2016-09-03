<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $roles = [
            ['name' => 'webmaster', 'label' => 'Webmaster'],
            ['name' => 'admin', 'label' => 'Administrator'],
//            ['name' => 'mitra', 'label' => 'Mitra'],
            ['name' => 'user', 'label' => 'User']
        ];

        foreach ($roles as $role) {
            factory(\App\Users\Role::class)->create($role);
        }

        $permissions = [
            ['name' => 'view-dashboard', 'label' => 'Access Dashboard'],
            ['name' => 'access-menu', 'label' => 'Access All Menus'],
            ['name' => 'access-setting', 'label' => 'Access All Settings'],
            ['name' => 'update-setting-global', 'label' => 'Update Only Global Settings'],
            ['name' => 'access-permission', 'label' => 'Access All Permissions'],
            ['name' => 'access-role', 'label' => 'Access All Roles'],
            ['name' => 'manage-user', 'label' => 'Manage Users'],
        ];

        for ($i = 0; $i < count($permissions); $i++) {
            $permissions[$i] = factory(\App\Users\Permission::class)->create($permissions[$i]);
        }

        $permissions[0]->roles()->save(App\Users\Role::find(3));
        $permissions[1]->roles()->save(App\Users\Role::find(1));
        $permissions[2]->roles()->save(App\Users\Role::find(1));
        $permissions[3]->roles()->save(App\Users\Role::find(2));
        $permissions[4]->roles()->save(App\Users\Role::find(1));
        $permissions[5]->roles()->save(App\Users\Role::find(1));
        $permissions[6]->roles()->save(App\Users\Role::find(2));
    }
}
