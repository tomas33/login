<?php

session_start();
require '../vendor/autoload.php';
$settings = require __DIR__ . '/../config/settings.php';
$app = new \Slim\App($settings);
// Set up dependencies
$dependencies = require __DIR__ . '/../config/dependencies.php';
$dependencies($app);
// Register routes
$routes = require __DIR__ . '/../config/routes.php';
$routes($app);

$controllers = require __DIR__ . '/../config/controllers.php';

$app->run();
