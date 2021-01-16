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
        DB::table('faqs')->insert([
            'vraag' => 'wie ben ik',
            'antwoord' => 'weet ik niet',
            'categorie' => 'persoon',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('faqs')->insert([
            'vraag' => 'wat voor site is dit',
            'antwoord' => 'weet ik niet',
            'categorie' => 'site',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('faqs')->insert([
            'vraag' => 'Hoe kan ik contact opnemen?',
            'antwoord' => 'Je kan contact opnemen door de formulier in te vullen op onze contact pagina',
            'categorie' => 'contact',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
