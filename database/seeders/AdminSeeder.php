<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'created_at' => date('Y-m-d H:i:s'),
                'is_admin' => true,
            ],
            [
                'name' => 'User',
                'username' => 'user',
                'password' => bcrypt('user'),
                'created_at' => date('Y-m-d H:i:s'),
                'is_admin' => false,
            ],
        ];

        User::insert($user);
    }
}
