<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\SignUpController;
use Slim\App;
return function (App $app) {
    $app->post('/login', LoginController::class);
    $app->post('/registro', SignUpController::class);
};
