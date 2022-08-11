<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            'Bottom' => 'classic',
            'Bottom' => 'cheesy crust',
            'Topping' => 'hawaii',
            'Topping' => 'Hot & Spicy',
        ];

        // foreach ($category as $key => $val) {
        //     ProductCategory::create([
        //         'name' => $key,
        //         'value' => $val,
        //     ]);
        // }

        ProductCategory::create([
            'name' => "bottom",
            'value' => 'classic',
        ]);

        ProductCategory::create([
            'name' => "topping",
            'value' => 'hot & spicy',
        ]);
        
        ProductCategory::create([
            'name' => "bottom",
            'value' => 'cheesy crust',
        ]);

        ProductCategory::create([
            'name' => "topping",
            'value' => 'hawaii',
        ]);

        
    }
}
