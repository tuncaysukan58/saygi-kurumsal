<?php

namespace Database\Seeders;

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
        User::firstOrCreate(
            ['email' => 'admin@saygikurumsal.com'],
            ['name' => 'SAY Kurumsal Admin', 'password' => Hash::make('SayKurumsal2026!')]
        );

        $this->call(DemoContentSeeder::class);
    }
}
