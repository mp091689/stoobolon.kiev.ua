<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'key' => 'site_name',
            'value' => 'СТО "На Оболони"',
        ]);
        DB::table('settings')->insert([
            'key' => 'emails',
            'value' => 'mp091689@gmail.com,mp091689@yandex.ru',
        ]);
        DB::table('settings')->insert([
            'key' => 'maps',
            'value' => '<iframe src="https://www.google.com/maps/d/embed?mid=1G7l0YrT4dZoa5QMV2fft8MTzyWo&hl=ru" width="700" height="440"></iframe>',
        ]);
        DB::table('settings')->insert([
            'key' => 'article_rows',
            'value' => '10',
        ]);
        DB::table('settings')->insert([
            'key' => 'review_rows',
            'value' => '10',
        ]);
        DB::table('settings')->insert([
            'key' => 'admin_rows',
            'value' => '15',
        ]);
    }
}
