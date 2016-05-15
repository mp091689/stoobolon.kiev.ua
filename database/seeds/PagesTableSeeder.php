<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'title' => 'Главная',
            'alias' => 'public',
            'body' => '<p>Контент главной станицы</p>',
            'public' => '1',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
        ]);
        DB::table('pages')->insert([
            'title' => 'Статьи',
            'alias' => 'articles',
            'body' => '<p>Тут нужно будет вывести список статей, для статей еще нужно создать миграцию и модель</p>',
            'public' => '1',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
        ]);
        DB::table('pages')->insert([
            'title' => 'Отзывы',
            'alias' => 'reviews',
            'body' => '<p>Тут нужно будет вывести все отзывы благодарных клиентов.</p>',
            'public' => '1',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
        ]);
        DB::table('pages')->insert([
            'title' => 'Контакты',
            'alias' => 'contacts',
            'body' => '<p>Тут будут размещены контакты, адрес и форма обратной связи</p>',
            'public' => '1',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
        ]);
        DB::table('pages')->insert([
            'title' => 'Услуги',
            'alias' => 'uslugi',
            'body' => '<p>Контент для страницы &quot;Услуги&quot;</p>',
            'public' => '1',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
        ]);
    }
}
