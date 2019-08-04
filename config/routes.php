<?php

use Slim\App;
use App\Controllers\RegisterController;
use App\Controllers\HelloWorldController;
return function (App $app) {
    $app->get('/hello', HelloWorldController::class);
    $app->post('/registro', RegisterController::class);
};
