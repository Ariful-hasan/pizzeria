<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $deliver = ['T', 'D'];
        $communication = ['S', 'E'];
        
        return [
            'user_id' => \App\Models\User::all()->random()->id,
            'product_id' => \App\Models\Product::all()->random()->id,
            'status' => 'P',
            'delivery' => $deliver[array_rand($deliver, 1)],
            'communication' => $communication[array_rand($communication, 1)],
        ];
    }
}
