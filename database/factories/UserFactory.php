<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Models Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => 'secret', // secret
        'remember_token' => str_random(10),
        'account' => $faker->randomElement([\App\User::ADMIN, \App\User::CUSTOMER]),
    ];
});

$factory->define(\App\Models\Admin\Page::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'content_page' => $faker->paragraph,

        'user_id' => App\User::all()->random()->id,
    ];
});


$factory->define(\App\Models\Admin\Product_cat::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'slug' =>str_slug($title),
        'parent_id' => $faker->randomElement([0, 5, 7]),
        'user_id' => App\User::all()->random()->id,
    ];
});

$factory->define(\App\Models\Admin\Product::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'product_name' => $title,
        'description' => str_slug($title),
        'image' => 'public/images/item-img-1-/' . $faker->numberBetween(1, 17) . 'png',
        'price' => $faker->numberBetween(500, 2000),
        'detail' => $faker->paragraph(4),
        'product_discount' => $faker->numberBetween(500,3000),
        'product_code' => $faker->numberBetween(500,3000),
        'product_cat_id' => \App\Models\Admin\Product_cat::where('parent_id', '!=', 0)->get()->random()->id,
        'user_id' => App\User::all()->random()->id,
    ];
});


