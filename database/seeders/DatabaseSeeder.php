<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('devices')->insert([
            'id' => '1',
            'name' => 'pong',
            'category' => 'games',
            'sku' => 'A0001',
            'price' => '69.99',
            'quantity' => '20'
        ]);
        DB::table('devices')->insert([
            'id' => '2',
            'name' => 'GameStation 5',
            'category' => 'Games',
            'sku' => 'A0002',
            'price' => '269.99',
            'quantity' => '15'
        ]);
        DB::table('devices')->insert([
            'id' => '3',
            'name' => 'AP Oman PC - Aluminum',
            'category' => 'Computers',
            'sku' => 'A0003',
            'price' => '1399.99',
            'quantity' => '10'
        ]);
        DB::table('devices')->insert([
            'id' => '4',
            'name' => 'Fony UHD HDR 55 4K TV',
            'category' => 'TVs and Accessories',
            'sku' => 'A0004',
            'price' => '1399.99',
            'quantity' => '5'
        ]);
    }
}
