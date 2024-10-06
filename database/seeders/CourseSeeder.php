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
        Course::create([
            'name' => 'Laravel 10',
            'price' => 100.10
        ]);

        Course::create([
            'name' => 'React',
            'price' => 200.20
        ]);

        Course::create([
            'name' => 'Vue',
            'price' => 300.10
        ]);

        Course::create([
            'name' => 'Angular',
            'price' => 400.50
        ]);

        Course::create([
            'name' => 'Node',
            'price' => 100.50
        ]);

    }
}
