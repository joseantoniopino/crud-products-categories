<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create([
            'id' => Str::uuid(),
            'name' => 'Standard',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'slug' => 'standard'
        ]);

        Category::factory()->create([
            'id' => Str::uuid(),
            'name' => 'Premium',
            'description' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.',
            'slug' => 'premium'
        ]);

        Category::factory()->create([
            'id' => Str::uuid(),
            'name' => 'Luxe',
            'description' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.',
            'slug' => 'luxe'
        ]);

        $directoryExist = Storage::exists('products');
        if ($directoryExist) Storage::deleteDirectory('products');
        Storage::makeDirectory('products');

        Product::factory(50)->create();
    }
}
