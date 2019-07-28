<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Twig\Extension\DebugExtension;

return function (App $app) {
    $container = $app->getContainer();

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];

        $logger = new Logger($settings['name']);
        $logger->pushProcessor(new UidProcessor());
        $logger->pushHandler(new StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    //base de datos
    $container['db'] = function ($c) {
        $db = $c['settings']['db'];
        $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],
                $db['user'], $db['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    };

    // Registrar componente al contenedor
    $container['view'] = function ($c) {
        $settings = $c->get('settings')['twig'];
        $view = new Twig(
                [$settings[ 'template_path']],
                ['cache' => $settings[ 'cache_path']]
        );

        // Add extensions
        $view->addExtension(new TwigExtension($c->get('router'), $c->get('request')->getUri()));
        $view->addExtension(new DebugExtension());

        return $view;
    };
};
