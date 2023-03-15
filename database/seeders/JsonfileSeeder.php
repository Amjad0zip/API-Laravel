<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Device;

class JsonfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json = file_get_contents('database/datajson/data.json');
        $data = json_decode($json, true);

        foreach ($data['users'] as $user) {
            if (array_key_exists('posts', $user)) {
                // Create user and posts here
            }
        }
        foreach ($data['devices'] as $Device) {
            $newDevice = Device::create([
                'name' => $Device['name'],
                'category' => $Device['category'],
                'sku' => $Device['sku'],
                'price' => $Device['price'],
                'quantity' => $Device['quantity']
                
            ]);}
        foreach ($data['users'] as $user) {
            $newUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt($user['password'])
            ]);
        }
    }
}
