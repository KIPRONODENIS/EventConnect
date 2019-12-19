<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        //
        'title'=>$faker->title,
        'image'=>'/images/test.png',
        'description'=>$faker->text(30)

    ];
});
