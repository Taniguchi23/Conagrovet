<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mascota;

class MascotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mascotas = [
            [
                'user_id' => 4,
                'raza_id' => 1,
                'nombre' => 'Maximiliano',
                'sexo' => 'M',
                'fecha_nacimiento' => '2022-10-17 00:00:00',
                'imagen' => 'public/raza/avatar.jpg',
                'peso' => 12.150,
                'color' => 'café',
            ],
            [
                'user_id' => 4,
                'raza_id' => 5,
                'nombre' => 'Luna',
                'sexo' => 'H',
                'fecha_nacimiento' => '2022-10-17 07:12:00',
                'peso' => 6.700,
                'color' => 'café',
                'imagen' => 'public/raza/avatar.jpg'
            ],
            [
                'user_id' => 5,
                'raza_id' => 7,
                'nombre' => 'Maximiliano',
                'sexo' => 'M',
                'fecha_nacimiento' => '2022-08-15 11:00:00',
                'peso' => 1.700,
                'color' => 'café',
                'imagen' => 'public/raza/avatar.jpg'
            ],
        ];
        Mascota::insert($mascotas);
    }
}
