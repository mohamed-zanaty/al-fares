<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {

        DB::table('settings')->insert([
            'title' => 'fares',
            'email' => 'mohamed@gmail.com',
            'number' => '010324235232',
            'facebook' => 'facbook.com',
            'twitter' => 'facbook.com',
            'instagram' => 'facbook.com',
            'youtube' => 'facbook.com',
            'image' => 'logo.png',
        ]);
    }
}
