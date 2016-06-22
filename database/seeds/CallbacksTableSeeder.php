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
            'phone' => '+38 (999) 999 99 99',
            'body' => 'Перезвоните мне.',
            'attention' => '1',
        ]);
        DB::table('callbacks')->insert([
            'author' => 'Джон Доу',
            'phone' => '+38 (999) 999 99 99',
            'body' => 'Перезвоните мне.',
            'attention' => '0',
        ]);
        DB::table('callbacks')->insert([
            'author' => 'Джон Доу',
            'phone' => '+38 (999) 999 99 99',
            'body' => 'Перезвоните мне.',
            'attention' => '0',
        ]);
        DB::table('callbacks')->insert([
            'author' => 'Джон Доу',
            'phone' => '+38 (999) 999 99 99',
            'body' => 'Перезвоните мне.',
            'attention' => '1',
        ]);
        DB::table('callbacks')->insert([
            'author' => 'Джон Доу',
            'phone' => '+38 (999) 999 99 99',
            'body' => 'Перезвоните мне.',
            'attention' => '0',
        ]);
    }
}
