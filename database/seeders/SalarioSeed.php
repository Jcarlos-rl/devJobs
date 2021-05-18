<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salarios')->insert([
            'nombre'     => '0 - 1000 USD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salarios')->insert([
            'nombre'     => '1000 - 2000 USD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salarios')->insert([
            'nombre'     => '2000 - 3000 USD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salarios')->insert([
            'nombre'     => '3000 - 4000 USD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salarios')->insert([
            'nombre'     => '4000 - 5000 USD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salarios')->insert([
            'nombre'     => '5000 - 6000 USD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salarios')->insert([
            'nombre'     => '6000 - 7000 USD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salarios')->insert([
            'nombre'     => '7000 - 8000 USD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salarios')->insert([
            'nombre'     => '8000 - 9000 USD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salarios')->insert([
            'nombre'     => '9000 - 10000 USD',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
