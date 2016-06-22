<?php

use Illuminate\Database\Seeder;

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedbacks')->insert([
            'author' => 'Джон Доу',
            'email' => 'example@gmail.com',
            'phone' => '+38 (999) 999 99 99',
            'body' => 'Что такое лорем ипсум?',
            'attention' => '0',
        ]);
        DB::table('feedbacks')->insert([
            'author' => 'Джон Доу',
            'email' => 'example@gmail.com',
            'phone' => '+38 (999) 999 99 99',
            'body' => 'Что такое лорем ипсум?',
            'attention' => '1',
        ]);
        DB::table('feedbacks')->insert([
            'author' => 'Джон Доу',
            'email' => 'example@gmail.com',
            'phone' => '+38 (999) 999 99 99',
            'body' => 'Что такое лорем ипсум?',
            'attention' => '1',
        ]);
        DB::table('feedbacks')->insert([
            'author' => 'Джон Доу',
            'email' => 'example@gmail.com',
            'phone' => '+38 (999) 999 99 99',
            'body' => 'Что такое лорем ипсум?',
            'attention' => '0',
        ]);
        DB::table('feedbacks')->insert([
            'author' => 'Джон Доу',
            'email' => 'example@gmail.com',
            'phone' => '+38 (999) 999 99 99',
            'body' => 'Что такое лорем ипсум?',
            'attention' => '1',
        ]);
    }
}
