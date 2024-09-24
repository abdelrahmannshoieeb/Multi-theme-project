<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Attribute;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            ['name' => 'Width', 'type' => 'Number', 'suffix' => 'cm'],
            ['name' => 'Height', 'type' => 'Number', 'suffix' => 'cm'],
            ['name' => 'Depth', 'type' => 'Number', 'suffix' => 'cm'],
            ['name' => 'Weight', 'type' => 'Number', 'suffix' => 'kg'],
            ['name' => 'Color', 'type' => 'Color', 'suffix' => ''],
            ['name' => 'Size', 'type' => 'Text', 'suffix' => ''],
            ['name' => 'Material', 'type' => 'Text', 'suffix' => ''],
            ['name' => 'Voltage', 'type' => 'Number', 'suffix' => 'V'],
            ['name' => 'Power', 'type' => 'Number', 'suffix' => 'W'],
            ['name' => 'Capacity', 'type' => 'Number', 'suffix' => 'L'],
            ['name' => 'Speed', 'type' => 'Number', 'suffix' => 'rpm'],
            ['name' => 'Frequency', 'type' => 'Number', 'suffix' => 'Hz'],
            ['name' => 'Length', 'type' => 'Number', 'suffix' => 'm'],
            ['name' => 'Width', 'type' => 'Number', 'suffix' => 'mm'],
            ['name' => 'Resolution', 'type' => 'Text', 'suffix' => ''],
        ];

        foreach ($attributes as $attribute) {
            Attribute::create($attribute);
        }
    }
}
