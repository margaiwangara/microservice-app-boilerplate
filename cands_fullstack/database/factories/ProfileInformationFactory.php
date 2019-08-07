<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\ProfileInformation::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'address' => $faker->address,
        'phone' => $faker->tollFreePhoneNumber,
        'lat' => $faker->randomFloat(2, 1, 50),
        'lon' => $faker->randomFloat(4, 1, 50),
        'city_id' => $faker->randomDigitNotNull,
        'country_id' => $faker->randomDigitNotNull,
        'profile_id' => factory(App\Profile::class)->create()->id
        
    ];
});
