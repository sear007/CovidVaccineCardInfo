<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $shop = Shop::whereHas('province', function($query){
            $query->whereNotIn('name', ['Pursat', 'Kandal']);
        })->inRandomOrder()->first();
        return [
            'name' => $this->faker->name,
            'shop_id' => $shop->id,
            'number_vaccinated' => $this->faker->numberBetween(1, 5),
            'card_type' => $this->faker->randomElement(['MOH', 'MOD']),
        ];
    }
}
