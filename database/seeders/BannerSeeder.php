<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            Banner::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'image' => $faker->imageUrl(640, 480, 'banners', true),
                'discount' => $faker->optional()->randomFloat(2, 0, 100),
                'btnText' => $faker->optional()->word,
                'btnURL' => $faker->optional()->url,
                'isHome' => $faker->boolean,
                'category_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
