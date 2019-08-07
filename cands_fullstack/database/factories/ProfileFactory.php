<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName(),
        'surname' => $faker->lastName,
        'email' => $faker->email,
        'profile_image' => $faker->imageUrl(500,500),
        'description' => $faker->paragraph(),
        'address' => $faker->address,
        'phone' => $faker->tollFreePhoneNumber,
        'website' => 'https://'.$faker->domainName,
        'working_days' => $faker->dayOfWeek.' - '.$faker->dayOfWeek.' '.random_int(1,12).' - '.random_int(1, 12).$faker->amPm(),
        'average_review' => $faker->randomFloat(2, 1, 9),
        'category_id' => factory(App\ProfileCategory::class)->create()->id
    ];
});
