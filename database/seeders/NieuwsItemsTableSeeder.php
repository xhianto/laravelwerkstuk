<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NieuwsItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nieuwsitems')->insert([
            'title' => 'eerste nieuws',
            'afbeelding' => '/storage/images/nieuws1.jpg',
            'tekst' => 'Dit is een tekst die bij het eerste nieuws hoort',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('nieuwsitems')->insert([
            'title' => 'volgende nieuws',
            'afbeelding' => '/storage/images/nieuws2.jpg',
            'tekst' => 'Ik weet niets te verzinnen voor de 2de nieuwsitem',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
