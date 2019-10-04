<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\SignUpController;
use Slim\App;
return function (App $app) {
    $app->get('/',HomeController::class);
    $app->map(['GET', 'POST'],'/login', LoginController::class);
    $app->get('/logout', LogoutController::class);
    $app->map(['GET', 'POST'],'/signup', SignUpController::class);
};
