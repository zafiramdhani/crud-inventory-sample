<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'org' => $this->faker->randomNumber(4, true),
            'plant' => $this->faker->word(),
            'sold_to' => $this->faker->userName(),
            'ship_to' => $this->faker->userName(),
            'material' => $this->faker->creditCardType(),
            'distrik' => $this->faker->safeEmailDomain(),
            'qty_minimum' => $this->faker->randomNumber(2, true),
            'qty_bonus' => $this->faker->randomNumber(3, true),
            'qty_status' => $this->faker->numberBetween(0, 3),
            'created_by' => $this->faker->userName(),
            'updated_by' => $this->faker->userName()
        ];
    }
}
