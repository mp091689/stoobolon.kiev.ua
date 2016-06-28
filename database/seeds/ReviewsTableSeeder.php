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
            'author' => 'Никита',
            'email' => 'mp091689@gmail.com',
            'body' => 'Хороший автосервис, ребята знают свое дело. Сервис внушает доверие. Рекомендую.',
            'public' => '1',
            'created_at' => '2016-06-17 19:57:09',
        ]);
    }
}
