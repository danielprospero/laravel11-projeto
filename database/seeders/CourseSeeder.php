<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Course::where('name', 'Laravel 10')->first()) {
            Course::create([
                'name' => 'Laravel 10',
                'price' => 100.10
            ]);
        }

        if (!Course::where('name', 'React')->first()) {
            Course::create([
                'name' => 'React',
                'price' => 200.20
            ]);
        }
        
        if (!Course::where('name', 'Vue')->first()) {
            Course::create([
                'name' => 'Vue',
                'price' => 300.10
            ]);
        }


        if (!Course::where('name', 'Angular')->first()) {
            Course::create([
                'name' => 'Angular',
                'price' => 400.50
            ]);
        }

        if (!Course::where('name', 'Node')->first()) {
            Course::create([
                'name' => 'Node',
                'price' => 100.50
            ]);
        }
    }
}
