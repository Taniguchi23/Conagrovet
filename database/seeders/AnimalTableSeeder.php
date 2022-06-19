<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animales = [
            [
                'nombre' => 'Perro',
            ],
            [
                'nombre' => 'Gato',
            ],
            [
                'nombre' => 'Conejo',
            ]
        ];
        Animal::insert($animales);
    }
}
