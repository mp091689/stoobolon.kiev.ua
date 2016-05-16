<?php

return [

    'title' => 'Статьи',

    'single' => 'статью',

    'model' => 'App\Article',

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title' => 'Заголовок',
        ],
        'alias' => [
            'title' => 'Псевдоним',
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
        'alias' => [
            'title' => 'Псевдоним',
            'type'  => 'text',
            'limit' => 50,
            'description' => 'Указанный вами псевдоним будет использоваться в URL для этой статьи.',
        ],
        'body' => [
            'title' => 'Содержание',
            'type'  => 'wysiwyg',
        ],
        'public' => [
            'title' => 'Опубликовать',
            'type'  => 'bool',
            'description' => 'Отметьте, что бы опубликовать.',
        ],
        'meta_title' => [
            'title' => 'Заголовок',
            'type'  => 'text',
            'limit' => '150',
            'description' => 'Мета заголовок статьи.',
        ],
        'meta_description' => [
            'title' => 'Описание',
            'type'  => 'textarea',
            'limit' => '500',
            'description' => 'Мета описание статьи.',
        ],
        'meta_keywords' => [
            'title' => 'Ключевые слова',
            'type'  => 'text',
            'limit' => '150',
            'description' => 'Мета ключевые слова статьи.',
        ],
    ],

    'rules' => [
        'title' => 'required',
        'alias' => 'unique:pages,alias|regex:/^[-a-z0-9]+$/',
    ],

    'messages' => [
        'title.required' => 'Поле "Название" обязательно для заполнения',
        'alias.required' => 'Поле "Псевдоним" обязательно для заполнения',
        'alias.regex' => 'Для псевдонима допускаются только маленькие латинские буквы и цифры',
        'alias.unique' => 'Указаный псевдоним уже занят'
    ],

    'sort' => array(
        'field' => 'created_at',
        'direction' => 'desc',
    ),

    'form_width' => 800,

    'filters' => [
        'title' => array(
            'title' => 'Заголовок',
        ),
        'alias' => array(
            'title' => 'Псевдони',
        ),
        'public' => [
            'title' => 'Опубликовать',
            'type' => 'bool',
            'description' => '"true" - опубликованные страницы, "false" - не опубликованные страницы.',
        ],
    ],

];