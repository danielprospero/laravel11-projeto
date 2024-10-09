<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classe;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Classe::where('name', 'Aula 1')->first()) {
            Classe::create([
                'name' => 'Aula 1',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus aperiam iure ex voluptatum quaerat quod ipsum nostrum, corporis facilis! Quaerat error repellendus velit iusto veniam praesentium eius, eveniet cum libero.',
                'order_classe' => 1,
                'course_id' => 1,
            ]);
        }

        if (!Classe::where('name', 'Aula 1')->first()) {
            Classe::create([
                'name' => 'Aula 1',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus aper',
                'course_id' => 2,
                'course_id' => 2,
            ]);
        }

        if (!Classe::where('name', 'Aula 2')->first()) {
            Classe::create([
                'name' => 'Aula 2',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus aperiam iure ex voluptatum quaerat quod ipsum nostrum, corporis facilis! Quaerat error repellendus velit iusto veniam praesentium eius, eveniet cum libero.',
                'order_classe' => 2,
                'course_id' =>1,
            ]);
        }

        if (!Classe::where('name', 'Aula 2')->first()) {
            Classe::create([
                'name' => 'Aula 2',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus aper',
                'order_classe' => 2,
                'course_id' => 2,
            ]);
        }
    }

}
