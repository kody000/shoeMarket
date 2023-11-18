<?php

namespace Database\Factories;

use App\Models\Shoe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShoeFactory extends Factory
{

    protected $model = Shoe::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'color' => $this->faker->colorName(),
            'price' => $this->faker->numberBetween(50, 500),
            'size' => $this->faker->numberBetween(36, 48),
        ];
    }
}
