<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();

        \App\Category::insert([
            ['name' => 'Laptops', 'slug' => 'Laptops', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Desktops', 'slug' => 'Desktops', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Mobile phones', 'slug' => 'mobile-phones', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tablets', 'slug' => 'tablets', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'TVs', 'slug' => 'tvs', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
