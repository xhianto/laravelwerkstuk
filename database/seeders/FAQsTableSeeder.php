<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([[
            'vraag' => 'Hoe kan ik mijn paswoord veranderen?',
            'antwoord' => 'Je kan je paswoord veranderen op je profiel-pagina.',
            'categorie' => 'Account',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'vraag' => 'Hoe kan ik kaartjes bestellen?',
            'antwoord' => 'Om kaartjes te kunnen bestellen moet je eerst een account aanmaken.',
            'categorie' => 'Reserveren',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'vraag' => 'Kan ik mijn Avatar van mijn profiel veranderen?',
            'antwoord' => 'Je kan je Avatar van je profiel veranderen op je profiel-pagina.',
            'categorie' => 'Account',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'vraag' => 'Hoe kan ik contact opnemen?',
            'antwoord' => 'Je kan contact opnemen door de formulier in te vullen op onze contact pagina.',
            'categorie' => 'Contact',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
