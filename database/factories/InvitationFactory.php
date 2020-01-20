<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invitation;
use Faker\Generator as Faker;

$factory->define(Invitation::class, function (Faker $faker) {
    return [
        'invited_by'=>factory(\App\User::class)->create()->id,
        'service_id'=>function() {
          return factory(\App\Models\Service::class)->create()->id;
        },
      
        'event_id'=>factory(\App\Event::class)->create()->id
    ];
});
