<?php

return [
    /**
     * Model title
     *
     * @type string
     */
    'title' => 'Статьи',

    /**
     * The singular name of your model
     *
     * @type string
     */
    'single' => 'статью',

    /**
     * The class name of the Eloquent model that this config represents
     *
     * @type string
     */
    'model' => 'App\Article',

    /**
     * The columns array
     *
     * @type array
     */
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
        ],
    ],

    /**
     * The edit fields array
     *
     * @type array
     */
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

    /**
     * The validation rules for the form, based on the Laravel validation class
     *
     * @type array
     */
    'rules' => [
        'title' => 'required',
        'alias' => 'unique:pages,alias|regex:/^[-a-z0-9]+$/',
    ],

    /**
     * The validation messages for the form, based on the Laravel validation class
     *
     * @type array
     */
    'messages' => [
        'title.required' => 'Поле "Название" обязательно для заполнения',
        'alias.required' => 'Поле "Псевдоним" обязательно для заполнения',
        'alias.regex' => 'Для псевдонима допускаются только маленькие латинские буквы и цифры',
        'alias.unique' => 'Указаный псевдоним уже занят'
    ],

    /**
     * The sort options for a model
     *
     * @type array
     */
    'sort' => array(
        'field' => 'created_at',
        'direction' => 'desc',
    ),

    /**
     * The width of the model's edit form
     *
     * @type int
     */
    'form_width' => 800,

    /**
     * The filter fields
     *
     * @type array
     */
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