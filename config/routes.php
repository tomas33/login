<?php

use Slim\App;
use App\Controllers\SignUpCntroller;
use App\Controllers\HelloWorldController;
return function (App $app) {
    $app->get('/hello', HelloWorldController::class);
    $app->post('/registro', SignUpCntroller::class);
};
