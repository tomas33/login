<?php

use Monolog\Logger;
define('APP_ROOT', __DIR__);
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'twig' => [
            'template_path' => __DIR__ . '/../templates/',
            'cache_path' => __DIR__ . '/../cache/twig',
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
        'doctrine' => [
            // if true, metadata caching is forcefully disabled
            'dev_mode' => true,
            // path where the compiled metadata info will be cached
            // make sure the path exists and it is writable
            'cache_dir' => APP_ROOT . '../../var/doctrine',
            // you should add any other path containing annotated entity classes
            'metadata_dirs' => [APP_ROOT . '../../src/Domain'],
            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => 'localhost',
                'port' => 3306,
                'dbname' => 'login',
                'user' => 'root',
                'password' => '',
                'charset' => 'UTF8'
            ]
        ]
    ],
];

