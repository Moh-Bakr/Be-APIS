<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'permission' => 'write',
                'password' => bcrypt('admin@123'),
            ],
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'role' => 'test',
                'permission' => 'read',
                'password' => bcrypt('admin@123'),
            ]]);
    }
}
