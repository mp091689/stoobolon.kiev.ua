<?php

return [
    'title' => 'SMTP настройки',
    'edit_fields' => [
        'smpt_host' => [
            'title' => 'Адрес SMTP-службы',
            'type' => 'text',
        ],
        'smpt_port' => [
            'title' => 'Порт',
            'type' => 'number',
        ],
        'smpt_username' => [
            'title' => 'Логин/почта пользователя',
            'type' => 'text',
        ],
        'smpt_password' => [
            'title' => 'Пароль пользователя',
            'type' => 'text',
        ],
        'smpt_encryption' => [
            'title' => 'Защита соединения',
            'type' => 'text',
        ],
    ],
    'rules' => [
        'smpt_host' => 'required|max:100',
        'smpt_port' => 'required|numeric',
        'smpt_username' => 'required',
        'smpt_password' => 'required',
        'smpt_encryption' => 'required',
    ],
];