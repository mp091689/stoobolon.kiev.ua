<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PagesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(CallbacksTableSeeder::class);
        $this->call(FeedbacksTableSeeder::class);
        $this->call(EmailTemplatesSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(SocialButtonsTableSeeder::class);
    }
}
