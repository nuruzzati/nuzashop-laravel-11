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

        $password = '12345';
        User::factory()->create([
                'name' => 'Nuza Nadenta',
                'username' => 'Nadenta',
                'email' => 'nuza@gmail.com',
                'password' => Hash::make($password),
            ]);
    }
}
