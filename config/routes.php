<?php

use App\Controllers\SignUpController;
use Slim\App;
return function (App $app) {
    $app->post('/registro', SignUpController::class);
};
