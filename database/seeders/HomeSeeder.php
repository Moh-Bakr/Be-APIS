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
            'file_path' => 'https://cdn.mos.cms.futurecdn.net/3upZx2gxxLpW7MBbnKYQLH-1200-80.jpg',
            'url' => 'url',
            'background_name' => 'background_name',
            'background_path' => 'background_path',
            'background_url' => 'background_url',

        ]);
    }
}
