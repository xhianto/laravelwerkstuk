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
        DB::table('nieuwsitems')->insert([[
            'title' => 'Monster Hunter (wordt verwacht)',
            'afbeelding' => '/storage/images/nieuws1.jpg',
            'tekst' => 'Achter onze wereld schuilt er nog een andere: een ongekende wereld waarin gevaarlijke en gewelddadige monsters hun territorium afbakenen met dodelijke wreedheid. Wanneer luitenant Artemis (Milla Jovovich) en haar elite-eenheid via een portaal terecht komen in deze nieuwe wereld, hebben ze geen idee wat hun te wachten staat. In haar wanhopige poging om naar huis terug te keren, ontmoet luitenant Artemis een mysterieuze jager (Tony Jaa), wiens unieke talenten hem in staat stellen om te overleven in dit vijandige gebied. Wanneer de krijgers geconfronteerd worden met angstaanjagende en meedogenloze aanvallen van monsters, moeten ze samenwerken om te overleven en alsnog een manier te vinden om naar huis terug te keren.',
            'created_at' => now(),
            'updated_at' => now(),
        ],
            [
            'title' => "The Kings's Man (wordt verwacht)",
            'afbeelding' => '/storage/images/nieuws2.jpg',
            'tekst' => "Een verzameling van 's werelds ergste tirannen en criminele meesterbreinen verzamelt zich om een oorlog uit te zetten die miljoenen zal vernietigen. De hoop is gevestigd op één man die tegen de tijd zal moeten racen om ze te stoppen. Het leidt tot de origine van de eerste onafhankelijke inlichtingendienst, 'The King's Man'.",
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
