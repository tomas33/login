<?php

use Slim\App;

require __DIR__.'/./vendor/autoload.php';

$settings       = require __DIR__ . '/./config/settings.php';
$app = new App($settings);

$dependencies   = require __DIR__ . '/./config/dependencies.php';
$dependencies($app);

$routes = require __DIR__ . '/./config/routes.php';
$routes($app);

$controllers    = require __DIR__ . '/./config/controllers.php';

$usecases       = require __DIR__ . '/./config/use-cases.php';

$UserRepository = require __DIR__ . '/./config/repositories.php';