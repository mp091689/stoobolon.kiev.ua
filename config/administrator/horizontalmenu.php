<?php

return [
    /**
     * Model title
     *
     * @type string
     */
    'title' => 'Меню',

    /**
     * The singular name of your model
     *
     * @type string
     */
    'single' => 'пункт меню',

    /**
     * The class name of the Eloquent model that this config represents
     *
     * @type string
     */
    'model' => 'App\Menu',

    /**
     * The columns array
     *
     * @type array
     */
    'columns' => [
        'id' =>[
            'title' => 'ID',
        ],
        'title' => [
            'title' => 'Заголовок',
        ],
        'sort' => [
            'title' => 'Сортировка',
        ],
        'page' => [
            'title' => 'Переход на страницу',
            'relationship' => 'page',
            'select' => 'title',
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
        'id' => [
            'title' => 'ID',
            'type'  => 'key',
        ],
        'title' => [
            'title' => 'Название',
            'type'  => 'text',
            'limit' => 50,
        ],
        'sort' => [
            'title' => 'Сортировка',
            'type'  => 'number',
            'description' => 'Пункты меню будут выстроены в указаном порядке.',
        ],
        'page' => [
            'title' => 'Страница',
            'type'  => 'relationship',
            'name_field' => 'title',
            'description' => 'Выберите страницу, на которую будет вести этот пункт меню.',
        ],
        'public' => [
            'title' => 'Опубликовать',
            'type'  => 'bool',
            'description' => 'Отметьте, что бы опубликовать.',
        ],
    ],

    /**
     * The validation rules for the form, based on the Laravel validation class
     *
     * @type array
     */
    'rules' => [
        'title' => 'required|unique:menus,title',
        'sort' => 'required|numeric|unique:menus,sort',
        'page_id' => 'required',
    ],

    /**
     * The validation messages for the form, based on the Laravel validation class
     *
     * @type array
     */
    'messages' => [
        'title.required' => 'Поле "Название" обязательно для заполнения',
        'title.unique' => 'Выбранное название уже занято',
        'sort.required' => 'Поле "Сортировка" обязательно для заполнения',
        'sort.numeric' => 'Поле "Сортировка" должно содержать только цифры',
        'sort.unique' => 'Указаный индекс сортировки уже занят',
        'page_id.required' => 'Поле "Страница" обязательно для заполнения',
    ],

    /**
     * The sort options for a model
     *
     * @type array
     */
    'sort' => array(
        'field' => 'sort',
        'direction' => 'asc',
    ),

    /**
     * The width of the model's edit form
     *
     * @type int
     */
    //'form_width' => 600,
];