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
        User::insert([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
