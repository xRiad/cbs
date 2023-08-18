<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutUsContentModel;

class AboutUsContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUsContentModel::firstOrCreate([
            'image' => 'a',
            'content' => json_encode([
              'az' => 'A'
            ])
        ]);
    }
}
