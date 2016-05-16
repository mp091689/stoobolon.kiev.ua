<?php

return [

    'title' => 'Меню',

    'single' => 'пункт меню',

    'model' => 'App\Menu',

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

    'rules' => [
        'title' => 'required|unique:menus,title',
        'sort' => 'required|integer|unique:menus,sort',
        'page_id' => 'required',
    ],


    'messages' => [
        'title.required' => 'Поле "Название" обязательно для заполнения',
        'title.unique' => 'Выбранное название уже занято',
        'sort.required' => 'Поле "Сортировка" обязательно для заполнения',
        'sort.numeric' => 'Поле "Сортировка" должно содержать только цифры',
        'sort.unique' => 'Указаный индекс сортировки уже занят',
        'page_id.required' => 'Поле "Страница" обязательно для заполнения',
    ],

    'sort' => array(
        'field' => 'sort',
        'direction' => 'asc',
    ),

    //'form_width' => 600,
];