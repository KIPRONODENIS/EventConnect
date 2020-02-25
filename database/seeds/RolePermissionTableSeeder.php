<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
         Permission::create(['name' => 'add services']);
         // this can be done as separate statements
        $role = Role::create(['name' => 'Vendor']);
        $role->givePermissionTo('add services');
    }
}
