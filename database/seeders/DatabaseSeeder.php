<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nama' => 'User',
            'email' => 'user@mail.com',
            'username' => 'user',
            'password' => Hash::make('password'),
            'no_hp' => '081585586085',
            'role_id' => 2
        ]);
    }
}