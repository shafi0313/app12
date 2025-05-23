<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        

        $this->call([
            UserSeeder::class,
        ]);

        User::factory(100)->sequence(fn ($sequence) => [
            'name' => 'Test User',
            'email' => 'test' . $sequence->index . '@example.com',
        ])->create();
    }
}
