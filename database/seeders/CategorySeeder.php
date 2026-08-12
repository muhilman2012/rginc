<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Advance', 
                'slug' => 'advance',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'Speed Female', 
                'slug' => Str::slug('Speed Female'),
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'Speed Male Junior', 
                'slug' => Str::slug('Speed Male Junior'), 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'Speed Male Senior', 
                'slug' => Str::slug('Speed Male Senior'), 
                'created_at' => now(), 
                'updated_at' => now()
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}