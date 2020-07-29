<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {

        DB::table('settings')->insert([
            'title' => 'fares',
            'email' => 'mohamed@gmail.com',
            'address' => 'مصر شبين الكوم',
            'number1' => '010324235232',
            'number2' => '010933831901',
            'facebook' => 'facbook.com',
            'twitter' => 'facbook.com',
            'instagram' => 'facbook.com',
            'youtube' => 'facbook.com',
            'image' => 'logo.png',
        ]);
    }
}
