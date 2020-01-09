<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ServiceCategory;
use Faker\Generator as Faker;

$factory->define(ServiceCategory::class, function (Faker $faker) {
    return [
        //
      
        'name'=>function(){
          $data=['Wedding','Printing','Conferences',' Catering'];
         return $data[array_rand($data)].str_random(2);
        }
    ];
});
