<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));

        $name = $faker->productName();

        return [
            'name' => $name,
            'slug' => Str::slug(random_string(2) . "-" . $name),
            'is_active' => $this->faker->boolean(),
            'description' => $faker->paragraph(),
            'short_description' => $faker->paragraph(1),
            'price' => $faker->numberBetween(10, 9000),
            'manage_stock' => false,
            'in_stock' => $faker->boolean(),
            'sku' => $faker->word(),
        ];
    }
}
