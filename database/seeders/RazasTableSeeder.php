<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Raza;

class RazasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $razas = [
            [
                'animal_id' => 1,
                'nombre' => 'Siberiano',
            ],
            [
                'animal_id' => 1,
                'nombre' => 'Schnauzerr',
            ],
            [
                'animal_id' => 1,
                'nombre' => 'Pastor Alemán',
            ],
            [
                'animal_id' => 1,
                'nombre' => 'Mestizo',
            ],
            [
                'animal_id' => 2,
                'nombre' => 'Siamés',
            ],
            [
                'animal_id' => 2,
                'nombre' => 'Ragdoll',
            ],
            [
                'animal_id' => 3,
                'nombre' => 'Belier Holandés',
            ],
            [
                'animal_id' => 3,
                'nombre' => 'Mini Rex',
            ],
            
        ];
        Raza::insert($razas);
    }
}
