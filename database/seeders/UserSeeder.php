<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Query Builder
        // Akaun User 1
        DB::table('users')->insert([
            'name' => 'Ali',
            'email' => 'ali@gmail.com',
            'password' => bcrypt('pass123'), // Hash::make('pass123')
            'nokp' => '808080808080'
        ]);

        // Akaun User 2
        DB::table('users')->insert([
            'name' => 'Abu',
            'email' => 'abu@gmail.com',
            'password' => bcrypt('pass123'), // Hash::make('pass123')
            'nokp' => '808080808081'
        ]);

        // Akaun User 3
        DB::table('users')->insert([
            'name' => 'Ahmad',
            'email' => 'ahmad@gmail.com',
            'password' => bcrypt('pass123'), // Hash::make('pass123')
            'nokp' => '808080808082'
        ]);

        // Akaun User 4
        DB::table('users')->insert([
            'name' => 'Siti',
            'email' => 'siti@gmail.com',
            'password' => bcrypt('pass123'), // Hash::make('pass123')
            'nokp' => '808080808083'
        ]);
    }
}
