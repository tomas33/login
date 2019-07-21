<?php

return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],
        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/log-app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        //config base de datos
        'db' => [
            'host' => 'mysql',
            'user' => 'login_user',
            'pass' => 'login_password',
            'dbname' => 'login'
        ],
    ],
];

