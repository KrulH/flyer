<?php

$factory->define (App\User::class, function ($faker)
{
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => bcrypt("deneme"),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Flyer::class, function (Faker\Generator $faker) {
    return [
//        'user_id' => factory(App\User::class)->create()->id,
        'street'      => $faker->streetAddress,
        'city'        => $faker->city,
        'zip'         => $faker->postcode,
        'state'       => $faker->state,
        'country'     => $faker->country,
        'price'       => $faker->numberBetween(10000,5000000),
        'description' => $faker->paragraphs(3,true)

    ];
});
