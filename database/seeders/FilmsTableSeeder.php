<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insert([[
            'title' => 'The Croods: A new Age',
            'beschrijving' => 'De Croods hebben de nodige gevaren en rampen overleefd, niet alleen gevaarlijke prehistorische dieren, maar ook het vriendje van hun dochter. Nu krijgen ze een compleet andere uitdaging die hun levens op z’n kop zet. In hun zoektocht naar een nieuwe woonplek stuiten ze op een idyllisch, door muren omringd paradijs. Ze denken dat ze hier alles hebben om goed te kunnen leven, maar komen dan tot de ontdekking dat er al een andere familie leeft: de Betermans. Met hun luxe boomhut, geweldige uitvindingen en geavanceerde systemen om verse producten te verbouwen, zijn ze een stuk verder in de evolutie dan de Croods. Wanneer ze de Croods vragen om als eerste gasten in hun weelderige onderkomen te verblijven, ontstaan er al snel irritaties tussen de twee families, die bijna escaleren. Dan dreigt er een nieuw gevaar en moeten de families hun onenigheden laten varen, hun krachten bundelen en hun veilige wereld binnen de muren verlaten om samen op avontuur te gaan.',
            'afbeelding' => '/storage/images/film1.jpg',
            'lengte' => 95,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Tenet',
            'beschrijving' => 'John David Washington is de Protagonist in Christopher Nolan\'s nieuwe scifi-actiefilm "Tenet". Slechts gewapend met één woord - Tenet - moet de Protagonist de wereld zien te redden van de ondergang, reizend door een schemerwereld van internationale spionage op een missie die zich afspeelt buiten de bestaande tijd. Niet tijdreizen, maar Inversie. De internationale cast van "Tenet" bestaat daarnaast uit Robert Pattinson, Elizabeth Debicki, Dimple Kapadia, Aaron Taylor-Johnson, Clémence Poésy, Michael Caine en Kenneth Branagh. Nolan schreef en regisseerde de film en maakte gebruik van een combinatie van IMAX®- en 70mm-film. "Tenet" wordt geproduceerd door Emma Thomas en Nolan. Uitvoerend producent is Thomas Hayslip. Nolan\'s creatieve team bestond uit director of photography Hoyte van Hoytema, production designer Nathan Crowley, editor Jennifer Lame, kostuumontwerper Jeffrey Kurland, visual effects supervisor Andrew Jackson en special effects supervisor Scott Fisher. De muziek werd gecomponeerd door Ludwig Göransson. "Tenet" werd in zeven landen op locatie gedraaid. Warner Bros. Pictures presenteert een Syncopy productie, een film van Christopher Nolan, "Tenet".',
            'afbeelding' => '/storage/images/film2.jpg',
            'lengte' => 150,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Greenland',
            'beschrijving' => 'Wanneer een naderende wereldwijde catastrofe de mensheid dreigt te vernietigen heeft John Garty (Gerard Butler) slechts vier dagen tijd om zijn gezin in veiligheid te brengen. Terwijl de klok genadeloos tikt en de maatschappij wanhopig vervalt in chaos moet hij alles uit de kast halen om zijn familie van New York naar een geheime militaire bunker in Groenland te brengen. Opkomend regisseur Ric Roman Waugh (Angel has fallen) en producent Basil Iwanyk (John Wick) werken samen met Gerard Butler in deze rampenfilm.',
            'afbeelding' => '/storage/images/film3.jpg',
            'lengte' => 119,
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
