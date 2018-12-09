<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 9; $i++){
            \App\Product::create([
                'name' => 'Laptop '.$i,
                'slug' => 'Laptop-'.$i,
                'details' => [13,14,15][array_rand([13,14,15])].'inch, '.[1,2,3][array_rand([1,2,4])].' TB SSD, 32GB RAM',
                'price' => rand(1500000,2500000),
                'description' => 'Lorem '.$i.' ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'
            ])->categories()->attach(1);
        }

        $product = \App\Product::find(1);
        $product->categories()->attach(2);

        for ($i = 1; $i <= 30; $i++){
            \App\Product::create([
                'name' => 'Desktop '.$i,
                'slug' => 'Desktop-'.$i,
                'details' => [13,14,15][array_rand([13,14,15])].'inch, '.[1,2,3][array_rand([1,2,4])].' TB SSD, 32GB RAM',
                'price' => rand(1500000,2500000),
                'description' => 'Lorem '.$i.' ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'
            ])->categories()->attach(2);
        }

        for ($i = 1; $i <= 9; $i++){
            \App\Product::create([
                'name' => 'Phone '.$i,
                'slug' => 'Phone-'.$i,
                'details' => [16,32,64][array_rand([16,32,64])].' GB, 5.'.[1,4,5][array_rand([1,4,5])].' inch screen',
                'price' => rand(1500000,2500000),
                'description' => 'Lorem '.$i.' ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'
            ])->categories()->attach(3);
        }

    }
}
