<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'detail'=>$faker->paragraph,
        'price'=>$faker->numberBetween(100,2000),
        'stock'=>$faker->randomDigit,
        'discount'=>$faker->numberBetween(20,40),
        'user_id'=> function(){
        	return APP\User::all()->random();
        }
    ];
});
