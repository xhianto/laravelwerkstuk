<?php

namespace Database\Seeders;

use App\Models\Voorstelling;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class)
            ->call(UsersTableSeeder::class)
            ->call(NieuwsItemsTableSeeder::class)
            ->call(FAQsTableSeeder::class)
            ->call(FilmsTableSeeder::class)
            ->call(ZalenTableSeeder::class)
            ->call(VoorstellingenTableSeeder::class);
    }
}
