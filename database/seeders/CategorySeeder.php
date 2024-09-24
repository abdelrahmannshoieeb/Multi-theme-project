<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            Category::create([
                'name' => $faker->word,
                'parent_id' => $faker->optional()->numberBetween(1, 20),
                'description' => $faker->optional()->paragraph,
                'image' => $faker->optional()->imageUrl,
                'isActive' => $faker->boolean,
            ]);
        }
    }
}
