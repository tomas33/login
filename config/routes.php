<?php

use Slim\App;
use App\Controllers\RegisterController;

return function (App $app) {
    $app->get('/hello', HelloWorldController::class);
    $app->post('/registro', RegisterController::class);
};
