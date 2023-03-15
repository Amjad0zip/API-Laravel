<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Mohammed KARIM',
            'email' => 'mohammed@mail.com',
            'password' => Hash::make('12345')
        ]);
        DB::table('users')->insert([
            'name' => 'Haytam SADIK ',
            'email' => 'haytam@mail.com',
            'password' => Hash::make('12345')
        ]);
    }
}
