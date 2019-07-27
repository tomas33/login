<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\HelloWorldController;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/hello', HelloWorldController::class);
};
