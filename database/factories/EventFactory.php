<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

  $event=$factory->define(Event::class, function (Faker $faker) {
    return [
        //
        'title'=>function(){

          return 'Hallo event';
        },
        'event_date'=>new DateTime(),
        'description'=>$faker->paragraph
    ];
});
