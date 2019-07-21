<?php

session_start();
require '../vendor/autoload.php';
$settings = require __DIR__.'/../src/settings.php';
$app = new \Slim\App($settings);
// Set up dependencies
$dependencies = require __DIR__.'/../src/dependencies.php';
$dependencies($app);
// Register routes
$routes = require __DIR__.'/../src/routes.php';
$routes($app);

$app->run();
