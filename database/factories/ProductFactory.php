<?php

namespace Database\Factories;

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
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        return [
            'name' => $this->faker->words(3, true), 
            'description' => $this->faker->sentence(7), 
            'price' => $this->faker->randomFloat(2, 10, 1000), 
            'image' => $faker->imageUrl(640, 480), 
            'category_id' => $this->faker->numberBetween(1,10), 
        ];
    }
}
