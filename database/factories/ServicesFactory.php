<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        //
        'title'=>function(){
          $data=['Wedding gown','Tent Renting','Conference Material',' Wedding card printing'];
         return $data[array_rand($data)];
        },
        'service_category_id'=> factory(\App\ServiceCategory::class)->create()->id,
        'image'=>'images/h7LcnCXdl9uIkGCg4PKnzm7JXJOCLN40upgN0wPC.jpeg',
        'description'=>$faker->text(30),
        'town'=>$faker->city

    ];
});
