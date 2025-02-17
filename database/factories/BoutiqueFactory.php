<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Boutique;

class BoutiqueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Boutique::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'image' => fake()->word(),
            'price' => fake()->randomFloat(2, 0, 999999.99),
            'url' => fake()->url(),
            'status' => fake()->word(),
        ];
    }
}
