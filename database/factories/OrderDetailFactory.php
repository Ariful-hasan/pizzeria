<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = ['Bottom', 'Topping'];
        $value = ['Classic', 'Cheesy Crust', 'Hawaii', 'Hot & Spicy'];
        
        return [
            'order_id' => \App\Models\Order::all()->random()->id,
            'name' => $name[array_rand($name, 1)],
            'value' => $value[array_rand($value, 1)],
        ];
    }
}
