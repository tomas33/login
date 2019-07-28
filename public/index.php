<?php

use Slim\App;

session_start();
require '../vendor/autoload.php';

$settings = require __DIR__ . '/../config/settings.php';
$app = new App($settings);

$dependencies = require __DIR__ . '/../config/dependencies.php';
$dependencies($app);

$routes = require __DIR__ . '/../config/routes.php';
$routes($app);

$controllers = require __DIR__ . '/../config/controllers.php';

$app->run();
