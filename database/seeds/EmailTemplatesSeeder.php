<?php

use Illuminate\Database\Seeder;

class EmailTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_templates')->insert([
            'id' => '1',
            'active' => true,
            'title' => 'Запрос обратного звонка, письмо администратору',
            'body' => '<h1>Обратный звонок</h1>
<strong>Автор:</strong>&nbsp;[name]<br />
<strong>Телефон:</strong>&nbsp;[phone]<br />
<strong>Сообщение:</strong><br />[comment]',
        ]);
        DB::table('email_templates')->insert([
            'id' => '2',
            'active' => true,
            'title' => 'Запрос со страницы Контакты, письмо клиенту',
            'body' => '<h1>Спасибо за Ваше сообщение.</h1>
Здравствуйте, [name].<br />
Мы получили Ваше сообщение:<br />&quot;[comment]&quot;.<br />
Наши специалисты ответят на ваш запрос в кратчайшие сроки по указанными вами контактым данным.<br />
Ваша почта: [email]<br />
Ваш телефон: [phone]<br />
Спасибо за обращение.<br />
С уважением, администрация &quot;СТО на Оболони&quot;!',
        ]);
        DB::table('email_templates')->insert([
            'id' => '3',
            'active' => true,
            'title' => 'Запрос со страницы контакты, письмо администратору',
            'body' => '<h1>Новый запрос, требующий ответа</h1>
<strong>Автор:</strong>&nbsp;[name]<br />
<strong>Почта:</strong> [email]<br />
<strong>Телефон:</strong>&nbsp;[phone]<br />
<strong>Сообщение:</strong><br />[comment]',
        ]);
        DB::table('email_templates')->insert([
            'id' => '4',
            'active' => true,
            'title' => 'Новый отзыв, письмо клиенту',
            'body' => '<h1>Спасибо за Ваш отзыв.</h1>
Здравствуйте, [name].<br />
Мы получили Ваш отзыв:<br />&quot;[comment]&quot;.<br />
В данный момент отзыв находится на рассмотрении у администрации для предотвращения распространения спама или материала содержащего ненормативную лексику.<br />
Ваше мнение для нас очень важно.<br />
С уважением, администрация &quot;СТО на Оболони&quot;!',
        ]);
        DB::table('email_templates')->insert([
            'id' => '5',
            'active' => true,
            'title' => 'Новый отзыв, письмо администратору',
            'body' => '<h1>Новый отзыв</h1>
<strong>Автор:</strong>&nbsp;[name]<br />
<strong>Почта:</strong> [email]<br />
<strong>Сообщение:</strong><br />[comment]',
        ]);
    }
}

