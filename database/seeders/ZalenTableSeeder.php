<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZalenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zaals')->insert([[
            'naam' => 'Zaal1',
            'plaatsen' => '100',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'naam' => 'Zaal2',
            'plaatsen' => '80',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'naam' => 'Zaal3',
            'plaatsen' => '80',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
