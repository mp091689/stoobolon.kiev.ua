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
            'email' => 'example@example.com',
            'phone' => '+38 (999) 999 9999',
            'body' => 'Это тестовая заявка. Не обращайте вниманияна эту заявку.',
            'attention' => '1',
        ]);
    }
}
