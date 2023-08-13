<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactModel;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      ContactModel::firstOrCreate([
        'adress' => 'Əhməd Rəcəbli küç, 56.',
        'phone' => '+994-70-777-77-77',
        'mail' => 'info@crazyinnovations@gmail.com',
        'whatsapp' => 'a',
        'instagram' => 'a',
        'facebook' => 'a',
        'linkedin' => 'a',
        'twitter' => 'a',
      ]);
    }
}
