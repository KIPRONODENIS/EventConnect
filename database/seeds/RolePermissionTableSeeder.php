<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
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
        $role = Role::create(['name' => 'client']);
        $role->givePermissionTo('add services');

          $role1 = Role::create(['name' => 'Admin']);
          $role1->givePermissionTo(Permission::all());
        User::first()->assignRole('Admin');
    }
}
