<?php

return [
    /**
     * Model title
     *
     * @type string
     */
    'title' => 'Страницы',

    /**
     * The singular name of your model
     *
     * @type string
     */
    'single' => 'страницу',

    /**
     * The class name of the Eloquent model that this config represents
     *
     * @type string
     */
    'model' => 'App\Page',

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
            'title' => 'Опубликовать',
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
        'field' => 'id',
        'direction' => 'asc',
    ),

    /**
     * The width of the model's edit form
     *
     * @type int
     */
    'form_width' => 800,

    /**
     * The action_permissions option lets you define permissions on the four primary actions: 'create', 'update', 'delete', and 'view'.
     * It also provides a secondary place to define permissions for your custom actions.
     *
     * @type array
     */
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
            'title' => 'Псевдоним',
        ),
        'public' => [
            'title' => 'Опубликовать',
            'type' => 'bool',
            'description' => '"true" - опубликованные страницы, "false" - не опубликованные страницы.',
        ],
    ],
];