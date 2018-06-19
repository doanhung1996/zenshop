<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\User::truncate();
        \App\Models\Admin\Page::truncate();
        factory('App\User', 50)->create();
        factory('App\Models\Admin\Page', 100)->create();
        factory('App\Models\Admin\Product_cat', 20)->create();
        factory('App\Models\Admin\Product', 300)->create();
    }
}
