<?php

namespace Database\Seeders;

use App\Constants\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'role' => Role::ADMIN,
                'name' => 'Admin',
                'email' => 'admin@app.com',
                'password' => bcrypt('##Zxc1234'),
                'removable' => false,
            ],
        ];

        User::insert($users);
    }
}
