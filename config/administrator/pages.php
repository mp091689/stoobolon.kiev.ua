<?php

return [

    'title' => 'Страницы',

    'single' => 'страницу',

    'model' => 'App\Page',

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
            'title' => 'Опубликовать',
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
            'description' => 'Указанный вами псевдоним будет использоваться в URL для этой страницы.',
            'visible' => function($model){
                switch ($model->alias) {
                    case 'public':
                        return false;
                        break;
                    case 'articles':
                        return false;
                        break;
                    case 'reviews':
                        return false;
                        break;
                    case 'contacts':
                        return false;
                        break;
                }
                return true;
            },
        ],
        'body' => [
            'title' => 'Содержание',
            'type'  => 'wysiwyg',
        ],
        'public' => [
            'title' => 'Опубликовать',
            'type'  => 'bool',
            'description' => 'Отметьте, что бы опубликовать.',
            'visible' => function($model){
                switch ($model->alias) {
                    case 'public':
                        return false;
                        break;
                }
                return true;
            },
        ],
        'meta_title' => [
            'title' => 'Заголовок',
            'type'  => 'text',
            'limit' => '150',
            'description' => 'Мета заголовок страницы.',
        ],
        'meta_description' => [
            'title' => 'Описание',
            'type'  => 'textarea',
            'limit' => '500',
            'description' => 'Мета описание страницы.',
        ],
        'meta_keywords' => [
            'title' => 'Ключевые слова',
            'type'  => 'text',
            'limit' => '150',
            'description' => 'Мета ключевые слова страницы.',
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
        'field' => 'id',
        'direction' => 'asc',
    ),

    'action_permissions'=> [
        'delete' => function($model)
        {
            switch ($model->alias) {
                case 'public':
                    return false;
                    break;
                case 'articles':
                    return false;
                    break;
                case 'reviews':
                    return false;
                    break;
                case 'contacts':
                    return false;
                    break;
            }
            return true;
        }
    ],

    'filters' => [
        'title' => array(
            'title' => 'Заголовок',
        ),
        'alias' => array(
            'title' => 'Псевдоним',
        ),
        'public' => [
            'title' => 'Опубликовать',
            'type' => 'bool',
            'description' => '"true" - опубликованные страницы, "false" - не опубликованные страницы.',
        ],
    ],

    'form_width' => 800,
];