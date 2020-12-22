<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            //'name' => 'admin',
            'username' => 'admin',
            'voornaam' => 'Ad',
            'familienaam' => 'Min',
            'straat' => 'straat',
            'huisnummer' => '1',
            'postcode' => 1000,
            'plaats' => 'Brussel',
            'geboortedatum' => date('Y-m-d', mktime(0,0,0,1,1,1900)),
            'email' => 'admin@domein.be',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \DB::table('users')->insert([
            //'name' => 'user',
            'username' => 'user',
            'voornaam' => 'U',
            'familienaam' => 'Ser',
            'straat' => 'straat',
            'huisnummer' => '2',
            'postcode' => 1000,
            'plaats' => 'Brussel',
            'geboortedatum' => date('Y-m-d', mktime(0,0,0,1,1,1900)),
            'email' => 'user@domein.be',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'role_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
