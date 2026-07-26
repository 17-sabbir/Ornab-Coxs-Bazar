<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    public function run()
    {
        // Clear existing slider data
        DB::table('slider')->truncate();
        
        // Insert new slider data
        DB::table('slider')->insert([
            [
                'title' => 'Ornab Coxs Bazar',
                'description' => 'Empowering communities and creating sustainable change in Cox\'s Bazar since 2000.',
                'image' => 'slider/slide1.jpg',
                'link' => '#',
                'is_active' => true,
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Education & Development',
                'description' => 'Providing quality education and skill development opportunities for sustainable livelihoods.',
                'image' => 'slider/slide2.jpg',
                'link' => '#',
                'is_active' => true,
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Healthcare for All',
                'description' => 'Ensuring basic healthcare services reach every corner of Cox\'s Bazar and beyond.',
                'image' => 'slider/slide3.jpg',
                'link' => '#',
                'is_active' => true,
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}