<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Customer::create([
            'full_name' => 'Ava Martinez',
            'email' => 'ava.martinez@example.com',
            'phone' => '+1 555 010 1001',
        ]);
        Customer::create([
            'full_name' => 'Liam Chen',
            'email' => 'liam.chen@example.com',
            'phone' => '+1 555 010 1002',
        ]);
        Customer::create([
            'full_name' => 'Sofia Patel',
            'email' => 'sofia.patel@example.com',
            'phone' => '+1 555 010 1003',
        ]);
        Customer::create([
            'full_name' => 'Noah Williams',
            'email' => 'noah.williams@example.com',
            'phone' => '+1 555 010 1004',
        ]);
        Customer::create([
            'full_name' => 'Mia Thompson',
            'email' => 'mia.thompson@example.com',
            'phone' => '+1 555 010 1005',
        ]);

        User::create(['username' => 'jordan.lee', 'full_name' => 'Jordan Lee', 'name' => 'Jordan Lee', 'email' => 'jordan.lee@example.com', 'password' => Hash::make('password')]);
        User::create(['username' => 'casey.rivera', 'full_name' => 'Casey Rivera', 'name' => 'Casey Rivera', 'email' => 'casey.rivera@example.com', 'password' => Hash::make('password')]);
        User::create(['username' => 'taylor.brooks', 'full_name' => 'Taylor Brooks', 'name' => 'Taylor Brooks', 'email' => 'taylor.brooks@example.com', 'password' => Hash::make('password')]);
        User::create(['username' => 'morgan.kim', 'full_name' => 'Morgan Kim', 'name' => 'Morgan Kim', 'email' => 'morgan.kim@example.com', 'password' => Hash::make('password')]);
        User::create(['username' => 'riley.adams', 'full_name' => 'Riley Adams', 'name' => 'Riley Adams', 'email' => 'riley.adams@example.com', 'password' => Hash::make('password')]);
    }
}
