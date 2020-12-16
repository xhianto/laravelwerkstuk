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
            'name' => 'admin',
            'email' => 'admin@domein.be',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}