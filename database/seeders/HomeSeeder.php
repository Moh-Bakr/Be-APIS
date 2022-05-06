<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('homes')->insert([
            'title' => 'title',
            'subtitle' => 'subtitle',
            'vision' => 'vision',
            'mission' => 'mission',
            'goal' => '["first goal","second goal"]',
            'phone' => 'phone',
            'email' => 'email',
            'name' => 'name',
            'file_path' => 'file_path',
            'url' => 'https://i1.wp.com/s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-7.png?ssl=1',
            'background_name' => 'background_name',
            'background_path' => 'background_path',
            'background_url' => 'https://images.unsplash.com/photo-1478760329108-5c3ed9d495a0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80',

        ]);
    }
}
