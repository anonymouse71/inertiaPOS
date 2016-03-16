<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Person::class, function (Faker\Generator $faker) {
    return [
        'name'    => $faker->name,
        'phone'   => $faker->phoneNumber,
        'email'   => $faker->email,
        'address' => $faker->address,
    ];
});

$factory->define(App\Models\Customer::class, function (Faker\Generator $faker) {
    return [
        'person_id'    => factory(App\Models\Person::class)->create()->id,
        'company_name' => $faker->company,
        'courier'      => $faker->company,
    ];
});
