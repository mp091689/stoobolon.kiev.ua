<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'title' => 'Пробная статья',
            'alias' => 'probnaja-statja',
            'body' => '<p>Контент пробной статьи</p>',
            'public' => '1',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
        ]);
    }
}
