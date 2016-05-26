<?php

return [

    'title' => 'Отзывы',

    'single' => 'отзыв',

    'model' => 'App\Review',

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'author' => [
            'title' => 'Автор',
        ],
        'body' => [
            'title' => 'Отзыв',
        ],
        'public' => [
            'title' => 'Опубиковать',
            'select' => "IF((:table).public, 'да', 'нет')",
        ],
        'created_at' => [
            'title' => 'Дата публикации',
        ],

    ],

    'edit_fields' => [
        'author' => [
            'title' => 'Автор',
            'type'  => 'text',
            'editable' => false,
        ],
        'body' => [
            'title' => 'Отзыв',
            'type'  => 'text',
            'editable' => false,
        ],
        'public' => [
            'title' => 'Опубликовать',
            'type'  => 'bool',
            'description' => 'Отметьте, что бы опубликовать.',
        ],
    ],

    'sort' => array(
        'field' => 'public',
        'direction' => 'desc',
    ),

    'filters' => [
        'author' => array(
            'title' => 'Автор',
        ),
        'body' => array(
            'title' => 'Отзыв',
        ),
        'public' => [
            'title' => 'Опубликовать',
            'type' => 'bool',
            'description' => '"true" - опубликованные страницы, "false" - не опубликованные страницы.',
        ],
        'created_at' => [
            'title' => 'Когда отзыв был написан?',
            'type' => 'datetime',
        ],
    ],

];