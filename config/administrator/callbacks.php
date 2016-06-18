<?php

return [
    'title' => 'Обратный звонок',
    'single' => 'звонок',
    'model' => 'App\CallBack',
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'author' => [
            'title' => 'Автор',
        ],
        'phone' => [
            'title' => 'Телефон',
        ],
        'body' => [
            'title' => 'Сообщение',
        ],
        'created_at' => [
            'title' => 'Дата обращения',
        ],

    ],

    'edit_fields' => [
        'author' => [
            'title' => 'Автор',
            'type'  => 'text',
            'editable' => false,
        ],
        'phone' => [
            'title' => 'Телефон',
            'type'  => 'text',
            'editable' => false,
        ],
        'body' => [
            'title' => 'Отзыв',
            'type'  => 'text',
            'editable' => false,
        ],
    ],

    'sort' => array(
        'field' => 'created_at',
        'direction' => 'desc',
    ),

    'filters' => [
        'author' => array(
            'title' => 'Автор',
        ),
        'phone' => array(
            'title' => 'Телефон',
        ),
        'body' => array(
            'title' => 'Сообщение',
        ),
        'created_at' => [
            'title' => 'Когда запрос был создан?',
            'type' => 'datetime',
        ],
    ],
    'action_permissions'=> [
        'create' => false,
        'delete' => false,
        'save'   => false,
        'view'   => false,
    ],

];