<?php

return [

    'title' => 'Акции',

    'single' => 'акцию',

    'model' => 'App\Share',

    'columns' => [
        'id' => [
            'title' => 'ID'
        ],
        'title' => [
            'title' => 'Название акции',
        ],
        'image' => [
            'title' => 'Изображение',
            'output' => '<img src="/uploads/shares/originals/(:value)" height="50" />',
        ],
        'begin' => [
            'title' => 'Начало акции',
        ],
        'end'=> [
            'title' => 'Конец акции',
        ],
        'public' => [
            'title' => 'Опубиковать',
            'select' => "IF((:table).public, 'да', 'нет')",
        ],
    ],

    'edit_fields' => [
        'title' => [
            'title' => 'Название',
            'type'  => 'text',
            'limit' => 100,
        ],
        'body' => [
            'title' => 'Содержание',
            'type'  => 'wysiwyg',
        ],
        'image' => [
            'title' => 'Изображение',
            'type' => 'image',
            'location' => public_path().'/uploads/shares/originals/',
            'naming' => 'random',
            'length' => 10,
            'size_limit' => 2,
            'sizes' => [
//                //растягивает изображение до нужных размеров
//                [100, 50, 'exact', public_path().'/uploads/shares/thumbs/exact/', 100],
//                //масштабирует по вертикали, а по горизонтали игнорирует размеры
//                [100, 50, 'portrait', public_path().'/uploads/shares/thumbs/portrait/', 100],
//                //масштабирует по горизонтали, а по вертикали игнорирует размеры
//                [100, 50, 'landscape', public_path().'/uploads/shares/thumbs/landscape/', 100],
//                //уменьшает изображение до нужных размеров, а пустоту заполняет белым цветом
//                [100, 50, 'fit', public_path().'/uploads/shares/thumbs/fit/', 100],
//                //автоматически определяет по какому краю уменьшать изображение
//                [100, 50, 'auto', public_path().'/uploads/shares/thumbs/auto/', 100],
                //масштабирует по указаным размерам и отрезает лишнее
                [100, 50, 'crop', public_path().'/uploads/shares/thumbs/crop/', 100],
            ],
        ],
        'begin' => [
            'title' => 'Начало акции',
            'type' => 'datetime',
            'date_format' => 'dd.mm.yy',
            'time_format' => 'HH:mm',
        ],
        'end' => [
            'title' => 'Конец акции',
            'type' => 'datetime',
            'date_format' => 'dd.mm.yy',
            'time_format' => 'HH:mm',
        ],
        'public' => [
            'title' => 'Опубликовать',
            'type' => 'bool'
        ],
    ],

    'filters' => [
        'title' => [
            'title' => 'Название акции',
        ],
        'begin' => [
            'title' => 'Интервал начала акции',
            'type' => 'datetime',
        ],
        'end' => [
            'title' => 'Интервал конца акции',
            'type' => 'datetime',
        ],
        'public' => [
            'title' => 'Опубликовать',
            'type' => 'bool',
            'description' => '"true" - опубликованные страницы, "false" - не опубликованные страницы.',
        ],
    ],

    'rules' => [
        'title' => 'required',
    ],

    'messages' => [
        'title.required' => 'Поле "Название" обязательно для заполнения',
    ],

    'form_width' => 600,
];