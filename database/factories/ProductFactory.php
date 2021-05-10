<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;
    private array $categories;

    public function __construct($count = null,
                                ?Collection $states = null,
                                ?Collection $has = null,
                                ?Collection $for = null,
                                ?Collection $afterMaking = null,
                                ?Collection $afterCreating = null,
                                $connection = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);
        $this->categories = Category::all()->pluck('id')->toArray();
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'category_id' => $this->faker->randomElement($this->categories),
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->paragraph,
            'image' => Str::remove('public/images/products/', $this->faker->image('public/images/products')),
            'price' => $this->faker->randomFloat(2, 10, 9999.99),
            'with_stock' => $this->faker->boolean
        ];
    }
}
