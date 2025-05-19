<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory(5)->create();
        foreach ($categories as $category) {
            foreach (config('app.available_locales') as $locale => $slug) {
                CategoryTranslation::factory()->create([
                    'category_id' => $category->id,
                    'locale' => $slug,
                ]);
            }
        }
    }
}
