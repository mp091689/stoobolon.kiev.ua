<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'title' => 'Пробная статья',
            'alias' => 'probnaja-statja',
            'body' => '<p><strong>Lorem Ipsum</strong> - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>',
            'public' => '1',
            'meta_title' => 'Пробная статья',
            'meta_description' => 'Описание пробной статьи',
            'meta_keywords' => 'статья, пробная',
        ]);
        DB::table('articles')->insert([
            'title' => 'Пробная статья 2',
            'alias' => 'probnaja-statja-2',
            'body' => '<p><strong>Lorem Ipsum</strong> - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>',
            'public' => '1',
            'meta_title' => 'Пробная статья',
            'meta_description' => 'Описание пробной статьи',
            'meta_keywords' => 'статья, пробная',
        ]);
        DB::table('articles')->insert([
            'title' => 'Пробная статья 3',
            'alias' => 'probnaja-statja-3',
            'body' => '<p><strong>Lorem Ipsum</strong> - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>',
            'public' => '1',
            'meta_title' => 'Пробная статья',
            'meta_description' => 'Описание пробной статьи',
            'meta_keywords' => 'статья, пробная',
        ]);
    }
}
