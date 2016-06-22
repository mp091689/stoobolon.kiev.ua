<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('pages')->insert([
            'title' => 'Главная',
            'alias' => 'public',
            'body' => '<h1>Что такое Lorem Ipsum?</h1>
<p><b>Lorem Ipsum</b> - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>',
            'public' => '1',
            'meta_title' => 'Главная',
            'meta_description' => 'Краткое описание главной страницы.',
            'meta_keywords' => 'главная, СТО, оболнь, Киев',
        ]);
        DB::table('pages')->insert([
            'title' => 'Статьи',
            'alias' => 'articles',
            'body' => '<h1>Что такое Lorem Ipsum?</h1>
<p><b>Lorem Ipsum</b> - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>',
            'public' => '1',
            'meta_title' => 'Статьи',
            'meta_description' => 'Краткое описание страницы статьи.',
            'meta_keywords' => 'статьи, СТО, оболнь, Киев',
        ]);
        DB::table('pages')->insert([
            'title' => 'Отзывы',
            'alias' => 'reviews',
            'body' => '<h1>Что такое Lorem Ipsum?</h1>
<p><b>Lorem Ipsum</b> - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>',
            'public' => '1',
            'meta_title' => 'Отзывы',
            'meta_description' => 'Краткое описание страницы отзывы.',
            'meta_keywords' => 'отзывы, СТО, оболнь, Киев',
        ]);
        DB::table('pages')->insert([
            'title' => 'Контакты',
            'alias' => 'contacts',
            'body' => '<h1>Что такое Lorem Ipsum?</h1>
<p><b>Lorem Ipsum</b> - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>',
            'public' => '1',
            'meta_title' => 'Контакты',
            'meta_description' => 'Краткое описание страницы контакты.',
            'meta_keywords' => 'контакты, СТО, оболнь, Киев',
        ]);
        DB::table('pages')->insert([
            'title' => 'Услуги',
            'alias' => 'uslugi',
            'body' => '<h1>Что такое Lorem Ipsum?</h1>
<p><b>Lorem Ipsum</b> - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>',
            'public' => '1',
            'meta_title' => 'Услуги',
            'meta_description' => 'Краткое описание страницы услуги.',
            'meta_keywords' => 'услуги, СТО, оболнь, Киев',
        ]);
        
    }
}
