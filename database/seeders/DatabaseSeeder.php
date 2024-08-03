<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Ahmed Fathi Abo El-Anin Ali',
            'email' => 'ahmed@bluegym.com',
            'password' => Hash::make('123412341234'),
            'email_verified_at' => now(),
            'role' => 'super_admin',
            'status' => 'active',
            'gender' =>  'male',
            'phone' => fake()->phoneNumber(),
        ]);
    }
}
