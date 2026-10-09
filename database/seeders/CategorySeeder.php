<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Basic Materials',
                'description' => 'Core building materials such as sand, cement, stone, bricks, blocks, and rebar.'
            ],
            [
                'name' => 'Wood & Roofing',
                'description' => 'Wood, plywood, timber, and roofing materials such as tiles, asbestos, sheet metal, and tarpaulins.'
            ],
            [
                'name' => 'Paint & Finishing',
                'description' => 'Paint for walls, wood, and metal, plus thinner, waterproofing, and adhesive products.'
            ],
            [
                'name' => 'Flooring & Walls',
                'description' => 'Floor and wall coverings including ceramic, granite, skirting, and trim profiles.'
            ],
            [
                'name' => 'Plumbing & Electrical',
                'description' => 'Plumbing supplies such as PVC pipes, faucets, and tanks, plus cables, lights, and switches.'
            ],
            [
                'name' => 'Nails & Hardware',
                'description' => 'Small hardware such as nails, bolts, screws, hinges, padlocks, and tools.'
            ],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(
                ['slug' => Str::slug($cat['name'])],
                [
                    'name' => $cat['name'],
                    'description' => $cat['description'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
