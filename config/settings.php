<?php

use Monolog\Logger;

return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'twig' => [
            'template_path' => __DIR__ . '/../templates/',
            'cache_path' => __DIR__ . '/../cache/',
        ],
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/log-app.log',
            'level' => Logger::DEBUG,
        ],
        'db' => [
            'host' => 'mysql',
            'user' => getenv('MYSQL_USER'),
            'pass' => getenv('MYSQL_PASSWORD'),
            'dbname' => getenv('MYSQL_DATABASE')
        ],
    ],
];

