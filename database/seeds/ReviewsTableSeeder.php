<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'author' => 'Джон Доу',
            'email' => 'example@gmail.com',
            'body' => 'Кайфовая СТОха, рекомендую 1.',
            'public' => '1',
        ]);
        DB::table('reviews')->insert([
            'author' => 'Джон Доу',
            'email' => 'example@gmail.com',
            'body' => 'Кайфовая СТОха, рекомендую 2.',
            'public' => '0',
        ]);
        DB::table('reviews')->insert([
            'author' => 'Джон Доу',
            'email' => 'example@gmail.com',
            'body' => 'Кайфовая СТОха, рекомендую 3.',
            'public' => '0',
        ]);
        DB::table('reviews')->insert([
            'author' => 'Джон Доу',
            'email' => 'example@gmail.com',
            'body' => 'Кайфовая СТОха, рекомендую 4.',
            'public' => '1',
        ]);
        DB::table('reviews')->insert([
            'author' => 'Джон Доу',
            'email' => 'example@gmail.com',
            'body' => 'Кайфовая СТОха, рекомендую 5.',
            'public' => '1',
        ]);
    }
}
