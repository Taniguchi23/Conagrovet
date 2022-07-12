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
                'imagen' => 'public/raza/avatar.jpg'
            ],
            [
                'animal_id' => 1,
                'nombre' => 'Schnauzerr',
                'imagen' => 'public/raza/avatar.jpg'
            ],
            [
                'animal_id' => 1,
                'nombre' => 'Pastor Alemán',
                'imagen' => 'public/raza/avatar.jpg'
            ],
            [
                'animal_id' => 1,
                'nombre' => 'Mestizo',
                'imagen' => 'public/raza/avatar.jpg'
            ],
            [
                'animal_id' => 2,
                'nombre' => 'Siamés',
                'imagen' => 'public/raza/avatar.jpg'
            ],
            [
                'animal_id' => 2,
                'nombre' => 'Ragdoll',
                'imagen' => 'public/raza/avatar.jpg'
            ],
            [
                'animal_id' => 3,
                'nombre' => 'Belier Holandés',
                'imagen' => 'public/raza/avatar.jpg'
            ],
            [
                'animal_id' => 3,
                'nombre' => 'Mini Rex',
                'imagen' => 'public/raza/avatar.jpg'
            ],

        ];
        Raza::insert($razas);
    }
}
