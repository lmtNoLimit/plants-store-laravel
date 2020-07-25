<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => '',
            'username' => 'admin',
            'password' => bcrypt('admin@123'),
            'role' => 'ADMIN'
        ]);
    }
}
