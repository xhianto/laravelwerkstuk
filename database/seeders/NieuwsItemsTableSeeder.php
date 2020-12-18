<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NieuwsItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('nieuwsitems')->insert([
            'title' => 'eerste nieuws',
            'afbeeldinguri' => 'dit komt nog',
            'tekst' => 'Dit is een tekst die bij het eerste nieuws hoort',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \DB::table('nieuwsitems')->insert([
            'title' => 'volgende nieuws',
            'afbeeldinguri' => 'dit komt ook nog',
            'tekst' => 'Ik weet niets te verzinnen voor de 2de nieuwsitem',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
