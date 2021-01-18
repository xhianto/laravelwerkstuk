<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoorstellingenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('voorstellings')->insert([[
            'prijs' => 9.99,
            'tijd' => date('Y-m-d H-i-s', mktime(20,0,0,1,20,2021)),
            'gereserveerd' => 0,
            'film_id' => 1,
            'zaal_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'prijs' => 10.99,
            'tijd' => date('Y-m-d H-i-s', mktime(20,0,0,1,20,2021)),
            'gereserveerd' => 0,
            'film_id' => 2,
            'zaal_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'prijs' => 12.99,
            'tijd' => date('Y-m-d H-i-s', mktime(20,30,0,1,20,2021)),
            'gereserveerd' => 0,
            'film_id' => 3,
            'zaal_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'prijs' => 9.99,
            'tijd' => date('Y-m-d H-i-s', mktime(21,0,0,1,21,2021)),
            'gereserveerd' => 0,
            'film_id' => 1,
            'zaal_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'prijs' => 9.99,
            'tijd' => date('Y-m-d H-i-s', mktime(20,30,0,1,22,2021)),
            'gereserveerd' => 0,
            'film_id' => 1,
            'zaal_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'prijs' => 10.99,
            'tijd' => date('Y-m-d H-i-s', mktime(20,0,0,1,21,2021)),
            'gereserveerd' => 0,
            'film_id' => 2,
            'zaal_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'prijs' => 10.99,
            'tijd' => date('Y-m-d H-i-s', mktime(20,0,0,1,24,2021)),
            'gereserveerd' => 0,
            'film_id' => 2,
            'zaal_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'prijs' => 12.99,
            'tijd' => date('Y-m-d H-i-s', mktime(21,0,0,1,22,2021)),
            'gereserveerd' => 0,
            'film_id' => 3,
            'zaal_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'prijs' => 12.99,
            'tijd' => date('Y-m-d H-i-s', mktime(20,30,0,1,25,2021)),
            'gereserveerd' => 0,
            'film_id' => 3,
            'zaal_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]]);
    }
}
