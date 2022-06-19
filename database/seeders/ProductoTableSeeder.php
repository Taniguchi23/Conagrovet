<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = [
            [
                'marca_id' => 1,
                'nombre' => '1° vacuna (doble)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'descripcion' => 'distemper y parvovirus',
            ],
            [
                'marca_id' => 1,
                'nombre' => '2° vacuna (Triple)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'descripcion' => 'distemper , hepatitis y leptospira',
            ],
            [
                'marca_id' => 1,
                'nombre' => '3° vacuna (Cuadruple)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'descripcion' => 'distemper, parvovirus, hepatitis , parainfluenza',
            ],
            [
                'marca_id' => 2,
                'nombre' => '4° vacuna (Quintuple)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'descripcion' => 'distemper, parvovirus, hepatitis , parainfluenza, leptospira',
            ],
            [
                'marca_id' => 2,
                'nombre' => '5° vacuna (Sextuple)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'descripcion' => 'distemper, parvovirus, hepatitis , parainfluenza, leptospira y rabia',
            ],
        ];
        Producto::insert($productos);
    }
}
