<?php

namespace Database\Factories;
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $this->faker->company,
        'address' => $this->faker->address,
        'phone' => $this->faker->e164PhoneNumber,
    ];
});
