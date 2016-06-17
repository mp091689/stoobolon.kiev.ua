<?php

return [

    'title' => 'Шаблоны писем',

    'single' => 'шаблон',

    'model' => 'App\EmailTemplate',

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title' => 'Название шаблона',
        ],
//        'body' => [
//            'title' => 'Шаблон письма',
//        ],
    ],

    'edit_fields' => [
        'title' => [
            'title' => 'Название шаблона',
            'type'  => 'text',
            'limit' => 100,
        ],
        'body' => [
            'title' => 'Шаблон письма',
            'type'  => 'wysiwyg',
            'description' => '  [name] - Имя,
                                [email] - Электронная почта,
                                [phone] - Телефон(только для страницы Контакты),
                                [comment] - Комментарий',
        ],
    ],

    'rules' => [
        'title' => 'required',
        'body' => 'required',
    ],

    'messages' => [
        'title.required' => 'Поле "Название шаблона" обязательно для заполнения',
        'body.required' => 'Поле "Шаблон письма" обязательно для заполнения',
    ],

    'form_width' => 800,

    'filters' => [
        'title' => [
            'title' => 'Название шаблона',
        ],
        'body' => [
            'title' => 'Шаблон письма',
        ],
    ],

    'action_permissions'=> [
        'delete' => false,
        'create' => false,
    ],
];