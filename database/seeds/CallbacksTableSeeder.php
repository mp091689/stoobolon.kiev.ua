<?php

use Illuminate\Database\Seeder;

class CallbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('callbacks')->insert([
            'author' => 'Джон Доу',
            'phone' => '+38 (999) 999 9999',
            'body' => 'Это тестовая заявка, не реагируйте на нее.',
            'attention' => '1',
        ]);
    }
}
