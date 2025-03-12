<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Range;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = $this->faker->numberBetween(10, 1000);
        $promotion  = $this->faker->numberBetween(0,80);
        return [
            'name'=> $this->faker->name(),
            'description'=>$this->faker->words(10,true),
            'price'=> $price,
            "stock"=> $this->faker->numberBetween(20,100),
            "promotion"=> $promotion,
            'newPrice'=> $price - ($price * $promotion / 100),
            'range_id'=>Range::factory()
        ];
    }
}

