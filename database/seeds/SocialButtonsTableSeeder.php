<?php

use Illuminate\Database\Seeder;

class SocialButtonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_buttons')->insert([
            'title' => 'facebook',
            'url' => 'https://www.facebook.com/sto.obolon/',
        ]);
        DB::table('social_buttons')->insert([
            'title' => 'vkontakte',
            'url' => '',
        ]);
        DB::table('social_buttons')->insert([
                'title' => 'twitter',
            'url' => '',
        ]);
        DB::table('social_buttons')->insert([
            'title' => 'linkedin',
            'url' => '',
        ]);
        DB::table('social_buttons')->insert([
            'title' => 'odnoklassniki',
            'url' => '',
        ]);
        DB::table('social_buttons')->insert([
            'title' => 'youtube',
            'url' => '',
        ]);
        DB::table('social_buttons')->insert([
            'title' => 'instagram',
            'url' => '',
        ]);
        DB::table('social_buttons')->insert([
            'title' => 'google',
            'url' => '',
        ]);
    }
}
