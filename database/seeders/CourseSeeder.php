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
        ]);

        Course::create([
            'name' => 'React',
        ]);

        Course::create([
            'name' => 'Vue',
        ]);

        Course::create([
            'name' => 'Angular',
        ]);

        Course::create([
            'name' => 'Node',
        ]);

    }
}
