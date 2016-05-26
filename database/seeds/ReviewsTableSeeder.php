<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'author' => 'Петров Петр Петрович',
            'email' => 'example@example.com',
            'body' => 'Отзыв благодарного клиента) Описание какая СТО хорошая и пунктуальные рабочие)',
            'public' => '1',
            'created_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'author' => 'Иванов Иван Иванович',
            'email' => 'example@example.com',
            'body' => 'Отзыв благодарного клиента) Описание какая СТО хорошая и пунктуальные рабочие)',
            'public' => '1',
            'created_at' => Carbon::now(),
        ]);
        DB::table('reviews')->insert([
            'author' => 'Васютки Василий Васильевич',
            'email' => 'example@example.com',
            'body' => 'Отзыв благодарного клиента) Описание какая СТО хорошая и пунктуальные рабочие)',
            'public' => '1',
            'created_at' => Carbon::now(),
        ]);
    }
}
