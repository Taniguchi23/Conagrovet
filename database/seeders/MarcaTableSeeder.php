<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marcas = [
            [
                'nombre' => 'Venco',
                'imagen' => 'public/marcas/venco.jpg',
            ],
            [
                'nombre' => 'Virbac',
                'imagen' => 'public/marcas/virbac.jpg',
            ],
        ];
        Marca::insert($marcas);
    }
}
