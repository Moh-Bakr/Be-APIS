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
            'goal' => 'goal',
            'name' => 'name',
            'file_path' => 'file_path',
            'url' => 'url',
        ]);
    }
}
