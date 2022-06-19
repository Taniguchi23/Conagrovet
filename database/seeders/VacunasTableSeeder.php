<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vacuna;

class VacunasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vacunas = [
            [
                'animal_id' => 1,
                'producto_id' => 1,
            ],
            [
                'animal_id' => 1,
                'producto_id' => 2,
            ],
            [
                'animal_id' => 1,
                'producto_id' => 3,
            ],
            [
                'animal_id' => 1,
                'producto_id' => 4,
            ],
            [
                'animal_id' => 1,
                'producto_id' => 5,
            ],
        ];
        Vacuna::insert($vacunas);
    }
}
