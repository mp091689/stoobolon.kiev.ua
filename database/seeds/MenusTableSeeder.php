<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'title' => 'Главная',
            'sort' => '10',
            'page_id' => '1',
            'public' => '1',
        ]);
        DB::table('menus')->insert([
            'title' => 'Статьи',
            'sort' => '30',
            'page_id' => '2',
            'public' => '1',
        ]);
        DB::table('menus')->insert([
            'title' => 'Отзывы',
            'sort' => '40',
            'page_id' => '3',
            'public' => '1',
        ]);
        DB::table('menus')->insert([
            'title' => 'Контакты',
            'sort' => '50',
            'page_id' => '4',
            'public' => '1',
        ]);
        DB::table('menus')->insert([
            'title' => 'Услуги',
            'sort' => '20',
            'page_id' => '5',
            'public' => '1',
        ]);
    }
}
