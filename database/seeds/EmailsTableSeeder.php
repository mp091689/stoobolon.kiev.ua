<?php

use Illuminate\Database\Seeder;

class EmailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_templates')->insert([
            'title' => 'Запрос со страницы контакты, письмо клиенту',
            'body' => '<h1>Спасибо за Ваше сообщение.</h1>
Здравствуйте, [name].<br />
Мы получили Ваше сообщение: &quot;[comment]&quot;.<br />
Наши специалисты ответят на ваш запрос в кротчайшие сроки по указанными вами контактым данным.<br />
Ваша почта: [email]<br />
Ваш телефон: [phone]<br />
Спасибо за обращение.<br />
С уважением, администрация &quot;СТО на Оболони&quot;!',
        ]);
        DB::table('email_templates')->insert([
            'title' => 'Запрос со страницы контакты, письмо администратору',
            'body' => '<h1>Новый запрос</h1>
<strong>Автор:</strong>&nbsp;[name]<br />
<strong>Почта:</strong> [email]<br />
<strong>Телефон:</strong>&nbsp;[phone]<br />
<strong>Сообщение:</strong> [comment]',
        ]);
        DB::table('email_templates')->insert([
            'title' => 'Новый отзыв, письмо клиенту',
            'body' => '<h1>Спасибо за Ваш отзыв.</h1>
Здравствуйте, [name].<br />
Мы получили Ваш отзыв: &quot;[comment]&quot;.<br />
В данный момент отзыв находится на рассмотрении у администрации для предотвращения распространения спама или материала содержащего ненормативную лексику.<br />
Ваше мнение для нас очень важно.<br />
С уважением, администрация &quot;СТО на Оболони&quot;!',
        ]);
        DB::table('email_templates')->insert([
            'title' => 'Новый отзыв, письмо администратору',
            'body' => '<h1>Новый отзыв</h1>
<strong>Автор:</strong>&nbsp;[name]<br />
<strong>Почта:</strong> [email]<br />
<strong>Сообщение:</strong> [comment]',
        ]);
    }
}
