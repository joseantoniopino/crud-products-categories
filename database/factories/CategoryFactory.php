<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence;
        $slug = Str::slug($name);
        return [
            'id' => Str::uuid(),
            'name' => $name,
            'description' => $this->faker->paragraph,
            'slug' => $slug,
        ];
    }
}
