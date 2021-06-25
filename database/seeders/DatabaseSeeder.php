<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'Shinji Ohashi',
            'email'    => 'sin7sin4@gmail.com',
            'role'     => 1,
            'password' => Hash::make('123456'),                
        ]);
    }
}
