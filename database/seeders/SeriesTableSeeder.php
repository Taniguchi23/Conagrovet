<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Serie;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $series = [
            [
                'producto_id' => 1,
                'codigo_factura' => '088765-089',
                'cantidad' => 25,

            ],
            [
                'producto_id' => 2,
                'codigo_factura' => '088765-089',
                'cantidad' => 25,

            ],
            [
                'producto_id' => 3,
                'codigo_factura' => '088765-089',
                'cantidad' => 25,

            ],
            [
                'producto_id' => 4,
                'codigo_factura' => '088765-089',
                'cantidad' => 25,

            ],
            [
                'producto_id' => 5,
                'codigo_factura' => '088765-089',
                'cantidad' => 25,

            ],

        ];
        Serie::insert($series);
    }
}
