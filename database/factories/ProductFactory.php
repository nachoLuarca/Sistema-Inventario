<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    public function definition()
    {
        return [
            'sku' => strtoupper($this->faker->bothify('PROD-###??')),
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2,1,1000),
            'category_id' => Category::factory(),
        ];
    }
}
