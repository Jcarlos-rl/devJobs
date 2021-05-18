<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicacionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubicacions')->insert([
            'nombre'     => 'CDMX',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('ubicacions')->insert([
            'nombre'     => 'Monterrey',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('ubicacions')->insert([
            'nombre'     => 'Guadalajara',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('ubicacions')->insert([
            'nombre'     => 'Queretaro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('ubicacions')->insert([
            'nombre'     => 'Puebla',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('ubicacions')->insert([
            'nombre'     => 'Sonora',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
