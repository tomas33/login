<?php

use Slim\App;
use Slim\Views\TwigExtension;
use Twig\Environment;

return function (App $app) {
    $container = $app->getContainer();

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];

        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
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
    // Get container
// Registrar componente al contenedor
    $container['view'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        $view = new \Slim\Views\Twig(
                $settings['template_path'],
                $settings[ 'cache_path']
        );

        // Add extensions
        $view->addExtension(new TwigExtension($c->get('router'),
                        $c->get('request')->getUri()));
        $view->addExtension(new DebugExtension());
        $view->addExtension(new \Twig\Environment($loader,['cache' => true]));
        return $view;
    };
};
