<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {


            User::create([
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => Str::random(60),


            ]);
        }
        factory(App\User::class,6)->create()->each(function($user){ $user->services()->save(factory(\App\Models\Service::class)
          ->create(['user_id'=>$user->id]));
     $service=$user->services;
     $service->each(function($service){$service->invitations()->save(factory(App\Invitation::class)->create(['service_id'=>$service->id]));});

        });

factory(\App\User::class,200)->create();
    }

}
